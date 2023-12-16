//year button logic
$(document).on("click","#btnyear",function() 
{ 
    var select = document.getElementById("btnyear");
    
    for(var year = 2020; year <=3000; year++) {
        var option = document.createElement("option");
        option.value = year;
        option.text = year;
        select.add(option);
    }
    
});

//course list ajax call
$(document).on("click","#btncourse",function() 
{ 
    $.ajax({
        url: "/sem3/ajaxfile/ajaxCourse.php",
        type: "POST",
        datatype: "json",
        data: {key:"value", action: "courseHandler"},
        beforesend: function(){
            alert("about to send ajax call");
        },
        success: function(result){
            //alert("success in ajax");
            console.log(result);
            // Select dropdown element
            $.each(result.data, function(key, value) {
                var i=1;
                $("#btncourse").append("<option id=btnID label='" + value.title + "'value='" + value.title + "'>" + value.title + "</option>");
            });           
        },

        error: function(jqXHR, textStatus, errorThrown) {
            // Handle errors here
            alert("error in ajax");
            console.error("AJAX Error: " + textStatus, errorThrown);
        },
    });           
});

//code box function
$("#btncourse").on("input",function(){
    alert("found");
    var entered = $("#btncourse").val();
    var codeBox = $("#btncode");
    codeBox.val(entered);
}); 

// submit btn function
$(document).on("click","#btncreate",function(){
    alert("submit");
}); 






