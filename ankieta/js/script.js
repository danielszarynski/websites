

function sprawdzCheckBoxy(klasa) {
    let jestMinJeden = 0;
     let liczNiezaznaczone = 0;
    
    let ileKlas = $("." + klasa).length;
    let ids = Array(ileKlas);
    ids = $("." + klasa).each(function(){ return $("." + klasa).attr("id")});
    
        console.log(ids[1].id);

         $("."+klasa).change(function() {
             
             for (let i = 0; i < ileKlas; i++) {
                 
                 if ($("#" + ids[i].id).prop("checked") == true)
                     jestMinJeden++;
                
             }
        if(jestMinJeden>0)
            {
             console.log("dziala2");
             $("."+klasa).removeAttr("required");
            jestMinJeden=0;
             }
                
              for (let i = 0; i < ileKlas; i++)
             if ($("#" + ids[i].id).prop("checked") == false)
                     liczNiezaznaczone++;
             console.log(liczNiezaznaczone)
             if (liczNiezaznaczone < ileKlas)
                 liczNiezaznaczone = 0;
         if(liczNiezaznaczone==ileKlas)
         {
            liczNiezaznaczone = 0;
             console.log("dziala3");
            $("."+klasa).attr("required", true);
             
            }

        //     if ($("#" + ids[i].id).prop("checked") == false  {
        //         console.log("dziala3");
        //         $("."+klasa).attr("required", true);
        //     }
         });
    
  }  


function dalej(x) {
     $("#of1").prop("checked", false);
        $("#of1").prop("checked", false);
    if (x == 0)
    {
        location.href = "thanks.php";
       
    }
    else
    {
        $("#wstep").css("display", "none");
        $("#ankieta").css("display", "block");
    
    }
    
}


function main() {

      sprawdzCheckBoxy("p1o");
    sprawdzCheckBoxy("p5oS");
    sprawdzCheckBoxy("p6oS");
    $('.pytanieOaplikacje').find("input").removeAttr("required");
    $('.pytanieOkrotkookresowe').find("input").removeAttr("required");
   $('.pytanieOdlugookresowe').find("input").removeAttr("required"); 
   
    //nie dziala, jak zadziala bd miod
    let checkboxyMobilne = ["#p1o2", "#p1o4", "#p1o6"];
    let checkboxydlugie = ["#p1o1", "#p1o2"];
    let checkboxykrotkie = ["#p1o5", "#p1o6"];
    $("#p1o2").on('click', () => {
        console.log("zmienilsie");
        if ($(`#p1o2`).prop('checked')==true)
        {
            console.log("zmienilsie2");

            $('.pytanieOaplikacje').find("input").attr("required", true);
            
           // $('.pytanieOkrotkookresowe').find("input").attr("required", true);
            
           // $('.pytanieOdlugookresowe').find("input").attr("required", true); 
            
            $('.pytanieOaplikacje').css("display", "block");
        }
         else if($(`#p1o4`).prop('checked')==false && $(`#p1o6`).prop('checked')==false){
            $('.pytanieOaplikacje').css("display", "none");

            $('.pytanieOaplikacje').find("input").removeAttr("required");

           // $('.pytanieOkrotkookresowe').find("input").removeAttr("required");
            
           // $('.pytanieOdlugookresowe').find("input").removeAttr("required"); 
            
        }
        
    })


    $("#p1o4").on('click', () => {
        console.log("zmienilsie");
        if ($(`#p1o4`).prop('checked')==true)
        {
            console.log("zmienilsie2");
            $('.pytanieOaplikacje').css("display", "block");
            $('.pytanieOaplikacje').find("input").attr("required", true);
        
        }
         else if($(`#p1o2`).prop('checked')==false && $(`#p1o6`).prop('checked')==false) {
            $('.pytanieOaplikacje').css("display", "none");

            $('.pytanieOaplikacje').find("input").removeAttr("required");

            
        }
        
    })

     $("#p1o6").on('click', () => {
        // console.log("zmienilsie");
        if ($(`#p1o6`).prop('checked')==true)
        {
            // console.log("zmienilsie2");
                $('.pytanieOaplikacje').css("display", "block");
            $('.pytanieOaplikacje').find("input").attr("required", true);
        
        }
        else if($(`#p1o4`).prop('checked')==false && $(`#p1o2`).prop('checked')==false){
            $('.pytanieOaplikacje').css("display", "none");

            $('.pytanieOaplikacje').find("input").removeAttr("required");

            
        }
        
     })
    
    
    
    //checkboxydlugie

    $("#p1o1").on('click', () => {
        console.log("zmienilsie");
        if ($(`#p1o1`).prop('checked')==true)
        {
            console.log("zmienilsie2");

           
            
           // $('.pytanieOkrotkookresowe').find("input").attr("required", true);
            
           $('.pytanieOdlugookresowe').find("input").attr("required", true); 
            
            $('.pytanieOdlugookresowe').css("display", "block");
        }
         else if($(`#p1o2`).prop('checked')==false ){
            $('.pytanieOdlugookresowe').css("display", "none");

            $('.pytanieOdlugookresowe').find("input").removeAttr("required");

           // $('.pytanieOkrotkookresowe').find("input").removeAttr("required");
            
           // $('.pytanieOdlugookresowe').find("input").removeAttr("required"); 
            
        }
        
    })


     $("#p1o2").on('click', () => {
        console.log("zmienilsie");
        if ($(`#p1o2`).prop('checked')==true)
        {
            console.log("zmienilsie2");

           
            
           // $('.pytanieOkrotkookresowe').find("input").attr("required", true);
            
           $('.pytanieOdlugookresowe').find("input").attr("required", true); 
            
            $('.pytanieOdlugookresowe').css("display", "block");
        }
         else if($(`#p1o1`).prop('checked')==false ){
            $('.pytanieOdlugookresowe').css("display", "none");

            $('.pytanieOdlugookresowe').find("input").removeAttr("required");

           // $('.pytanieOkrotkookresowe').find("input").removeAttr("required");
            
           // $('.pytanieOdlugookresowe').find("input").removeAttr("required"); 
            
        }
        
     })
    
    
    
    
    //checkboxykrotkie

    $("#p1o5").on('click', () => {
        console.log("zmienilsie");
        if ($(`#p1o5`).prop('checked')==true)
        {
            console.log("zmienilsie2");

           
            
           // $('.pytanieOkrotkookresowe').find("input").attr("required", true);
            
           $('.pytanieOkrotkookresowe').find("input").attr("required", true); 
            
            $('.pytanieOkrotkookresowe').css("display", "block");
        }
         else if($(`#p1o6`).prop('checked')==false ){
            $('.pytanieOkrotkookresowe').css("display", "none");

            $('.pytanieOkrotkookresowe').find("input").removeAttr("required");

           // $('.pytanieOkrotkookresowe').find("input").removeAttr("required");
            
           // $('.pytanieOdlugookresowe').find("input").removeAttr("required"); 
            
        }
        
    })


     $("#p1o6").on('click', () => {
        console.log("zmienilsie");
        if ($(`#p1o6`).prop('checked')==true)
        {
            console.log("zmienilsie2");

           
            
           // $('.pytanieOkrotkookresowe').find("input").attr("required", true);
            
           $('.pytanieOkrotkookresowe').find("input").attr("required", true); 
            
            $('.pytanieOkrotkookresowe').css("display", "block");
        }
         else if($(`#p1o5`).prop('checked')==false ){
            $('.pytanieOkrotkookresowe').css("display", "none");

            $('.pytanieOkrotkookresowe').find("input").removeAttr("required");

           // $('.pytanieOkrotkookresowe').find("input").removeAttr("required");
            
           // $('.pytanieOdlugookresowe').find("input").removeAttr("required"); 
            
        }
        
    })


    //czesc metryczna

    $(`#male`).on('change', function () {

        if ($(this).is(':checked')) {
            // $('#pm4o2').val("Bezrobotny");
            $('#om-4-2').html("Bezrobotny");

            // $('#pm4o3').val("Pracujący");
            $('#om-4-3').html("Pracujący");

            // $('#pm5o1').val("kawaler");
            $('#om-5-1').html("Kawaler");

            // $('#pm5o2').val("zonaty");
            $('#om-5-2').html("Żonaty");

            // $('#pm5o3').val("partner");
            $('#om-5-3').html("Partner");

            // $('#pm5o4').val("rozwiedziony");
            $('#om-5-4').html("Rozwiedziony");




        }
    });

    $(`#female`).on('change', function () {

        if ($(this).is(':checked')) {
            // $('#pm4o2').val("Bezrobotna");
            $('#om-4-2').html("Bezrobotna");

            // $('#pm4o3').val("Pracująca");
            $('#om-4-3').html("Pracująca");

            // $('#pm5o1').val("panna");
            $('#om-5-1').html("Panna");

            // $('#pm5o2').val("zamezna");
            $('#om-5-2').html("Zamężna");

            // $('#pm5o3').val("partnerka");
            $('#om-5-3').html("Partnerka");

            // $('#pm5o4').val("rozwiedziona");
            $('#om-5-4').html("Rozwiedziona");



        }
    });



}


function sprawdzInputy() {

//jeseli p1 lub p5 lub p6 maja require-red
    
//jeseli p1 lub p5 lub p6 nie maja require-green
    //{
    
    // }
    if ($(".p1o").prop("required")==true)
        $(".p1o").closest('div').css("border", "2px solid red");
    else
        $(".p1o").closest('div').css("border", "2px solid green"); 
    
    
    if ($(".p5oS").prop("required")==true)
        $(".p5oS").closest('div').css("border", "2px solid red");
    else
        $(".p5oS").closest('div').css("border", "2px solid green");
    
    
    
    if ($(".p6oS").prop("required")==true)
        $(".p6oS").closest('div').css("border", "2px solid red");
    else
      $(".p6oS").closest('div').css("border", "2px solid green");
        
   
    
    if ($(".p10oS").prop("required")==true)
        $(".p10oS").closest('div').css("border", "2px solid red");
    else
        $(".p10oS").closest('div').css("border", "2px solid green"); 
    
    
    
        // let checkboxes = document.querySelectorAll('input:required');
    let wymagane = $("input:required");
    let ileWymaganych = wymagane.length;
let idD=Array(ileWymaganych)
    let i = 0; let j = 0;
    while (ileWymaganych) {
        ileWymaganych--;
        idD[i] = wymagane[i].id;
        if ($('#' + idD[i]).is(":checked"))
        {
            j++;
        }
     

        //console.log($('#'+idD[i]).is(":checked"));
         i++;
    }
    let ktoreZaznaczone = Array(j);
    


  ileWymaganych = wymagane.length;

    i = 0;
    let k = 0;
    while (ileWymaganych) {
        ileWymaganych--;
        idD[i] = wymagane[i].id;
        if ($('#' + idD[i]).is(":checked"))
        {
            ktoreZaznaczone[k] = wymagane[i].id;
            console.log( ktoreZaznaczone[k]);
            k++;
        }
     
         i++;
    }
    i = 0;
     ileWymaganych = wymagane.length;
    while (ileWymaganych) {
        ileWymaganych--;
      //  if (i>25)
      //      $('#' + wymagane[i].id).parent().css("border", "2px solid red");
      //  else
        $('#' + wymagane[i].id).closest('div').css("border", "2px solid red");
        i++;
    }

    let znalezionoP7 = 0;
    let znalezionoP8 = 0;
    let znalezionoP9 = 0;
    i = 0;
    let z = k;
    while (z) {
        //gdy choc 1 pole nie zaznaczone z p7-p9, nie koloruj na zielono diva nad nimi

        $('#'+ktoreZaznaczone[i]).closest('div').css({ "border": "2px solid green"});
        if (ktoreZaznaczone[i].includes("p7o") )
        {
            znalezionoP7++;
        }

        if (ktoreZaznaczone[i].includes("p8o")  )
        {
            znalezionoP8++;
        }

        if (ktoreZaznaczone[i].includes("p9o"))
        {
            znalezionoP9++;
        }

         z--; i++;
     }
     
     i = 0;
    z = k;



    console.log("znaleziono" + znalezionoP7 + " " + znalezionoP8 + " " + znalezionoP9 + " ");
    if (znalezionoP7 != 5)
        $("#p7").css({ "border": "2px solid red" });
       else
        $("#p7").css({ "border": "2px solid green" });
    
    if (znalezionoP8 != 2)
        $("#p8").css({ "border": "2px solid red" });
       else
        $("#p8").css({ "border": "2px solid green" });
    
    if (znalezionoP9 != 3)
        $("#p9").css({ "border": "2px solid red" });
    else
$("#p9").css({ "border": "2px solid green" });
    
    
    
    
}
