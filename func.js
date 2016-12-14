//ESIMESE TABELI LAADIMINE
function esimene() {
    $.get( 'getMail.php', function( data ) {
        if(data === ''){
            alert('Vabandame, kuid teie päring ebaõnnestus..');
        }else{
            $('#esimene').html(data);
        };
    });
};

//TEISE TABELI LAADIMINE
function teine() {
    var tab;
    
    if($('#m22ratud').hasClass('active')){
        var tab = 1;
    }else if($('#tellimisel').hasClass('active')){
        var tab = 2;
    }else{
        var tab = 3;
    };
    
    var box = 1;
    if($('.showAll').prop('checked')){
        var box = 0;
    }
    
    $.get( 'getTasks.php?tab='+tab+'&box='+box, function( data ) {
        if(data === ''){
            alert('Vabandame, kuid teie päring ebaõnnestus..');
        }else{
            $('#teine').html(data);
        };
    });
};

//ÜLESANDEST LOOBUMINE
function loobu(id){
     if (confirm('Oled sa kindel, et soovid sellest loobuda?')) {
      $.get( 'loobu.php?id='+id, function( data ) {
          if(data === 'success'){
             esimene();
             teine();
           }else{
               alert('Vabandame, kuid teie päring ebaõnnestus..');
          };
        });
    }
};

//ÜLESANDE VÕTMINE PÕHITABELIST
function take_check(id){
    $.get( 'take.php?id='+id+"&c=1", function( data ) {
        if(data === 'success'){
            esimene();
            teine();
        }else if(data === 'na'){
			alert('Keegi juba võttis selle ülesande!');
			esimene();
            teine();
		}else{
            alert('Vabandame, kuid teie päring ebaõnnestus..');
        };
    });
};

//ÜLESANDE VÕTMINE KÕRVALT (SAAB KA NAPSATA)
function take(id){
    $.get( 'take.php?id='+id, function( data ) {
        if(data === 'success'){
            esimene();
            teine();
        }else{
            alert('Vabandame, kuid teie päring ebaõnnestus..');
        };
    });
};

//MEILI EELVAADE
function preview(id){
    $.get( 'preview.php?id='+id, function( data ) {
        if(data === ''){
            alert('Palun ava meil käsitsi!');
        }else{
            $('#eelvaade').html(data);
        }
    });
};

//SPAMMI MÄRKIMINE
function spam(id){
    
    if (confirm('Oled sa kindel, et soovid selle meili eemaldada?')) {
        $.get( 'spam.php?id='+id, function( data ) {
            if(data === 'success'){
                esimene();
                alert('Ütle nägemist!');
            }else{
                alert('Midagi ebaõnnestus! Meil jäi alles.');
            }
        });
    }
};
 
//ÜLESANDE UUENDAMINE
function update(id,state){
    $.get( 'update.php?id='+id+'&state='+state, function( data ) {
        if(data === 'success'){
            esimene();
            teine();
        }else{
            alert('Vabandame, kuid teie päring ebaõnnestus..');
        };
    });
};

//SAKKIDE STAATUSED
window.state = 1;
	
function m22ratud() {
	$("#tellimisel").removeClass("active");
	$("#tehtud").removeClass("active");
	$("#m22ratud").addClass("active");
	window.state = 1;
	teine();
};
		
function tellimisel() {
	$("#m22ratud").removeClass("active");
	$("#tehtud").removeClass("active");
	$("#tellimisel").addClass("active");
	window.state = 2;
	teine();
};
	
function tehtud() {
	$("#m22ratud").removeClass("active");
	$("#tellimisel").removeClass("active");
	$("#tehtud").addClass("active");
	window.state = 3;
	teine();
};

//UUENDA TEIST VAADET
$(".showAll").change(function() {
	teine();
});

//OTSING

function otsi() {
    if($("#otsing").val() === ""){
            $("#tulemid").css("display","none");
        }else{
            $("#tulemid").css("display","initial");
        };
var q = $("#otsing").val();
var valik = $( "#valik option:selected" ).text();
var type = "0";
switch(valik) {
    case "Uued":
        type = "0";
        break;
    case "Määratud":
        type = "1";
        break;
    case "Tellimisel":
        type = "2";
        break;
    case "Tehtud":
        type = "3";
        break;
    default:
        type = "0";
};

    $.get( 'otsing.php?q='+q+"&type="+type, function( data ) {
        if(data !== ''){
            $('#tulemused').html(data);
        }else{
            alert('Selliseid meile ei leidu..');
        };
    });
};