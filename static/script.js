$('#logInForm').submit(function(e)
{
    // alert('a');
    $('#errLogin').addClass('hidden');
    e.preventDefault();
    $.post('ldapauth.php', {
        'username': $('#rollno').val(),
        'password': $('#password').val()
    }, function(data, status) 
    {
        data = JSON.parse(data);
        // console.log(data);
        if(data['status'] == 'success') window.location = 'index.php';
        else 
        {
            $('#errLogin').text('Error: '+data['details']);
            $('#errLogin').removeClass('hidden');
            // $('#errLogin').show();
        }
    });
});

function valid()
{
$('#smailWarning').fadeOut();
// ^([A-Za-z]){2}([0-9]){2}([A-Za-z]){1}([0-9]){3}(@smail.iitm.ac.in)$
var patt = new RegExp("^([A-Za-z]){2}([0-9]){2}([A-Za-z]){1}([0-9]){3}(@smail.iitm.ac.in)$");
if(patt.test($('input[type="email"]').val()))
{
    // alert('hatt bsdk');
    $('#smailWarning').fadeIn();
    return false;
}
return true;
}

$('input[type="checkbox"]#donate').click(function(){
    if($(this).is(":checked")){
        $('#bProj').fadeIn();
    }
    else if($(this).is(":not(:checked)")){
        $('#bProj').fadeOut();
    }
});
$('#bProj').fadeIn();

$('input[type="radio"][name="year"]').change(function(){
    if (this.value == '2019') {
        $('.batchProj').fadeOut();
    }
    else if (this.value == '2018') {
        $('.batchProj').fadeIn();
    }
});

$('#quote').on("change keyup paste", function() {
    var len = $(this).val().length;
    if(len<96) $('#quoLen').text((96 - len)+' characters remaining')
   });
$('#quoLen').text((96 - $('#quote').val().length)+' characters remaining')


// SMAIL format check
// ^([A-Za-z]){2}([0-9]){2}([A-Za-z]){1}([0-9]){3}(@smail.iitm.ac.in)$

// $(document)

$('#smailWarning').fadeOut();
if(!$('input[type="checkbox"]#donate').is(":checked")) $('#bProj').fadeOut();
if(!$('input[type="radio"]#2018').is(":checked")) $('.batchProj').fadeOut();

// $.getJSON('hostels.json', function(json)
// {
//     json['hostels'].forEach(element => {
//         // console.log(element);
//         // $("select[id*=select]").append(`<option>${element}</option>`);
//         $("select#hostel").append(`<option id="hostel_${element}" value="${element}">${element}</option>`);
//     });
// });

// function selhostel(hostel)
// {
//     console.log(hostel);
//     // $('select#hostel option[value="hostel_'+hostel+'"]').attr('selected', 'selected');
//     $('select#hostel option#hostel_'+hostel).attr('selected', 'selected');
//     // $('select#hostel option#hostel_Godavari').attr('selected', 'selected');
//     // $('select#hostel option[value="hostel_Godavari"]').attr('selected', 'selected');
// }
