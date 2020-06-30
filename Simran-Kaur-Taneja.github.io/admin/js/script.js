$(document).ready(function(){
	$('#selectallboxes').click(function(event){
		if(this.checked){
			$('.checkboxes').each(function(){
				this.checked=true;
			});
		}
		else{
			$('.checkboxes').each(function(){
			this.checked=false;
		});
		}
	})
})

function loadUsersOnline() {

	$.get("function.php?onlineusers=result", function(data){
		

		$(".usersonline").text(data);


	});

}

setInterval(function(){

	loadUsersOnline();

},500);

/*
$(document).ready(function(){
	alert('hi');
});*/