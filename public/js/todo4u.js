
$(document).ready(function () {
	
	// Deze functies activeren de knoppen voor het aanroepen van ajax-functies en sorteren van todo items
	
	$(".editNameButton").each(function() {
		var regEx = /editNameButtonId([0-9]+)/;
		var id = regEx.exec($(this).attr('class'));
		id = id[1];
		$(this).click({id: id}, editName);
	});
	
	$(".editContentButton").each(function() {
		var regEx = /editContentButtonId([0-9]+)/;
		var id = regEx.exec($(this).attr('class'));
		id = id[1];
		$(this).click({id: id}, editContent);
	});
	
	$(".finishedCheckbox").each(function() {
		var regEx = /finishedId([0-9]+)/;
		var id = regEx.exec($(this).attr('class'));
		id = id[1];
		$("input", this).change({id: id}, updateFinished);
	});
	
	$("#deleteToDoItem").click(function() {
		var regEx = /deleteItemId([0-9]+)/;
		var ids = [];
		$(".deleteItem").each(function() {
			if ($(this).prop('checked') === true) {
				ids.push(regEx.exec($(this).attr('class'))[1]);
			}
		});
		
		$.ajax({
			url: "deleteItems",
			dataType: "html",
			type: "POST",
			data: {
				_token: varToken,
				ids: ids
			},
			success: function(result) {
				// console.log('succes is ' +result);
			},
			error: function(result) {
				// console.log('error is ' + result);
			}
		});
		
		var reload = window.setTimeout(reloadPage, 250);
	});
	
	$("#sortByName").click(function() {
		var sort_by_name = function(a, b) {
			return $(a).find(".nameField").html().localeCompare($(b).find(".nameField").html());
		}
		
		var list = $(".notExpiredItems .toDoItem ").get();
		list.sort(sort_by_name);
		for (var i = 0; i < list.length; i++) {
			list[i].parentNode.appendChild(list[i]);
		}
	});
	
	$("#sortByEditDate").click(function() {

		var sort_by_name = function(a, b) {
			return $(a).find(".editDateField").html().localeCompare($(b).find(".editDateField").html());
		}
		
		var list = $(".notExpiredItems .toDoItem ").get();
		list.sort(sort_by_name);
		for (var i = 0; i < list.length; i++) {
			list[i].parentNode.appendChild(list[i]);
		}
	});
	
	$("#sortByEndDate").click(function() {
		var sort_by_name = function(a, b) {
			varA = $(a).find(".endDateField").html();
			varB = $(b).find(".endDateField").html();
			return $(a).find(".endDateField").html().localeCompare($(b).find(".endDateField").html());
		}
		
		var list = $(".notExpiredItems .toDoItem ").get();
		list.sort(sort_by_name);
		for (var i = 0; i < list.length; i++) {
			list[i].parentNode.appendChild(list[i]);
		}
	});
	
	// Geeft het formulier weer om een todo item toe te voegen
	$("#addToDoItem").click(function() {
		$("#loadToDoItem").load("loadForm");
	});
});


function editName (event) {
	var id = event.data.id;
	var naam = $(".nameFieldId"+id).html();
	$(this).html('Opslaan');
	$(this).off('click');
	$(".nameFieldId"+id).html('<input type="text" name="naam" value="'+naam+'">');
	$(this).click({id: id}, sendName);
}

function editContent (event) {
	var id = event.data.id;
	var content = $(".contentFieldId"+id).html();
	$(this).html('Opslaan');
	$(this).off('click');
	$(".contentFieldId"+id).html('<textarea name="content">'+content+'</textarea>');
	$(this).click({id: id}, sendContent);
}

function sendName(event) {
	var id = event.data.id;
	var name = $(".nameFieldId"+id+" >  input").val();
	
	$.ajax({
		url: "updateToDoName",
		dataType: "json",
		type: "POST",
		data: {
			_token: varToken,
			id: event.data.id,
			name: name
		},
		success: function(result) {
			// console.log('success is ' + result);
			$(".nameFieldId"+id).html(result[0]);
			$(".editDateFieldId"+id).html(result[1]);
		},
		error: function(result) {
			// console.log('error is ' + result);
			$(".nameFieldId"+id).html("Er is iets fout gegaan. Vernieuw de pagina en probeer het opnieuw");
		}
	});
	
	$(this).html('Bewerken');
	$(this).off('click');
	$(this).click({id: id}, editName);
}

function sendContent(event) {
	var id = event.data.id;
	var content = $(".contentFieldId"+id+" >  textarea").val();

	$.ajax({
		url: "updateToDoContent",
		dataType: "json",
		type: "POST",
		data: {
			_token: varToken,
			id: event.data.id,
			content: content
		},
		success: function(result) {
			// console.log('success is ' + result);
			$(".contentFieldId"+id).html(result[0]);
			$(".editDateFieldId"+id).html(result[1]);
		},
		error: function(result) {
			// console.log('error is ' + result);
			$(".contentFieldId"+id).html("Er is iets fout gegaan. Vernieuw de pagina en probeer het opnieuw");
		}
	});
	$(this).html('Bewerken');
	$(this).off('click');
	$(this).click({id: id}, editContent);
}

function updateFinished(event) {
	var id = event.data.id;
	var finished = $(".finishedId"+id+" >  input").prop('checked');

	$.ajax({
		url: "updateFinished",
		dataType: "html",
		type: "POST",
		data: {
			_token: varToken,
			id: event.data.id,
			finished: finished
		},
		success: function(result) {
			// console.log('succes is ' +result);
		},
		error: function(result) {
			// console.log('error is ' + result);
		}
	});
	
	// Reload omdat het mogelijk is dat een verlopen todo item niet meer verlopen is
	var reload = window.setTimeout(reloadPage, 250)
}

function reloadPage() {
	location.reload();
}

// For testing purposes
function addToDoItem() {
	$("table tr:nth-child(1) td:nth-child(2) input").val('Freek');
	$("table tr:nth-child(2) td:nth-child(3) input").val('2018-11-11');
	$("table tr:nth-child(3) td:nth-child(4) input").val('2019-12-12');
	$("table tr:nth-child(3) td:nth-child(2) input").prop('checked', true);
	$("table tr:nth-child(4) td:nth-child(2) textarea").val('Test');
}