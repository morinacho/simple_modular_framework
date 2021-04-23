var table;

$(document).ready(function() {
    // Variables for book codes
    var cutterCode;   

    // All Code
    url = $("#add-autor").attr('data-cutter') + "public/js/tablacutter-js.txt"
        $.ajax({
            url: url,
            success: function(result) {
            table = result; 
        }
    });

    $(".menu").click(function() {
        $(".keep").toggleClass("width");
    });

    // Actuva el input para mas de un ejemplar
    $("#single-book").change(function() {
        if ($(this).val() == 2) {
            $("#copiaUnica").css("display", "none");
            $("#cantEjemplar").css("display", "initial");
        }
    })
    
    // Codigo para agregar distintos autores    
    $("#add-autor").click(function() { 
        // Recupero los value para generar un select no visible para enviarlos al controller
        autorValue = $("#select-author").attr('data-id');
        tipoValue  = $("#author-type").val();
        if (autorValue!= null && tipoValue != null) {  
            $("#list-author").append(
                "<option value="+ autorValue + "_" + tipoValue +" id="+ autorValue + "_" + tipoValue +" selected></option>"
            );

            // Recupero texto del select para mostrar los que se van seleccionanto
            autorText  = $("#select-author").text();
            typeText   = $("#author-type option:selected").text();
            // Muestro los seleccionados
            $("#list-authors #tbody").append( 
                "<tr id="+autorValue+"_"+tipoValue+">" +
                    "<td>" + autorText + "</td>" +
                    "<td>" + typeText + "</td>" +
                    "<td><a href='javascript:void(0)' class='delautor material-icons' id='" + autorValue + "." + tipoValue + "'>clear</a></td></tr>"
            );

            // Generate cutter code   
            cutterCode = generateCutterCode(autorText, table);
            console.log(cutterCode);
        }

        $(".delautor").click(function() {
            id = ($(this).attr("id")).replace(".", "_"); 
            $("#list-autors #tbody").remove(id);
        });
    });

    // Genera la clave copiando el dni ingresado
    $("#doc-user").keyup(function() {
        $('#pass-user').val(($('#doc-user').val()));
    });

    //Function which allows only the entry numbers
    $('.justNumbers').keypress(function(e) {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 48) || (keynum == 56))
            return true;
        return /\d/.test(String.fromCharCode(keynum));
    });

    // Previsualizacion de imagen de portada 
    function readURL(input, label) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(label).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cover-img").change(function() {
        readURL(this, "#cover-preview");
    });

    $("#topic-book").change(function() {
        url = $(this).attr('data-url');
        $("#topic-book option:selected").each(function() {
            value = $(this).val();
            url += "/" + value;
            $.get(url, { value }, function(data) {
                $("#subtopic-book").empty().removeAttr("disabled").append("<option disabled selected>Selecionar sub-tema</option>");
                aux = data.split(".");
                for (i = 0; i < aux.length - 1; i++) {
                    option = (aux[i].split("-"));
                    $("#subtopic-book").append("<option value=" + option[0] + ">" + option[1] + "</option>")
                }
            });
        });
    });

    $("#subtopic-book").change(function() {
        url = $(this).attr('data-url');
        $("#subtopic-book option:selected").each(function() {
            value = $(this).val();
            url += "/" + value;
            $.get(url, { value }, function(data) {
                $("#category-book").empty().removeAttr("disabled").append("<option disabled selected>Selecionar categoria</option>");
                aux = data.split(".");
                for (i = 0; i < aux.length - 1; i++) {
                    option = (aux[i].split("-"));
                    option2 = option[1].split("_");
                    $("#category-book").append("<option value=" + option[0] + " data-code='" + option2[1] + "'>" + option2[0] + "</option>")
                }
            });
        });
    });

    $("#user-school").change(function() {
        url = $(this).attr('data-url');
        $("#user-school option:selected").each(function() {
            value = $(this).val();
            url += "/" + value;
            $.get(url, { value }, function(data) {
                $("#user-career").empty().removeAttr("disabled").append("<option disabled selected>Seleccionar carrera</option>");
                aux = data.split(".");
                for (i = 0; i < aux.length - 1; i++) {
                    option = (aux[i].split("-"));
                    $("#user-career").append("<option value=" + option[0] + ">" + option[1] + "</option>")
                }
            });
        });
    });

    // Funcion para guardado de categoria
    $("#save-editorial").click(function(event){
        event.preventDefault();  
        name    = $("#new-name-editorial" ).val();
        address = $("#new-address-editorial").val();
        url     = $(this).attr('data-url');
        if(name != "" &&  address != "" ){
            $.post(url, { editorial_name: name, editorial_address: address}, function(data) {  
                $("#editorial-book").append("<option value="+data+">"+ name+"</option>");
                $("#new-name-editorial" ).val("");
                $("#new-address-editorial").val("");
            });
        }
    });
    
    // Funcion para guardado de autor
    $("#save-author").click(function(event){
        event.preventDefault();  
        name     = $("#new-name-author").val();
        lastname = $("#new-lastname-author").val();
        url      = $(this).attr('data-url');
        if(name != "" &&  lastname != "" ){
            $.post(url, { author_name: name, author_lastname: lastname}, function(data) {  
                $("#author-select").append("<option value="+data+">"+ name + " " + lastname +"</option>");
                $("#new-name-author" ).val("");
                $("#new-lastname-author").val("");
            });
        }
    });

     // Search editorial
     $('#search-editorial').keyup(function(){ 
        var input = $(this).val();
        if(input != ""){
            url = $(this).attr('data-url');
            search(input, url).done(function(response){ 
                $('#options-editorial').html(response); 
                closeSelect("#container-editorial", "#select-editorial", "#options-editorial>li.option", "#selected-editorial"); 
            }); 
        } 
    });
    $("#select-editorial").click(function(event) {
        selectSimulator(event, $(this),"#container-editorial"); 
    });

    // Search author
    $('#search-author').keyup(function(){ 
        var input = $(this).val();
        if(input != ""){
            url = $(this).attr('data-url');
            search(input, url).done(function(response){
                $('#options-author').html(response);
                closeSelect("#container-author", "#select-author", "#options-author>li.option", "#selected-author"); 
            }); 
        } 
    }); 
    $("#select-author").click(function(event) {
        selectSimulator(event, $(this), "#container-author"); 
    });

    // Asyncronic search
    function search(param, url) { 
        return $.post(url, {search : param});
    }

    // JS for select simulator
    function selectSimulator(event, element, container){
        event.stopPropagation();
        element.siblings(container).toggleClass("open");  
    }

    //Close select from asyncronic search
    function closeSelect(container, select, options, selected){
        $(options).click(function() {
            var value = $(this).find("span").html(),
                input = $(this).children()[1]; 
            $(select).html(value);
            $(select).attr("data-id", $(this).attr("id"));
            $(selected).val(value);
            $(container).toggleClass("open");
            if(input != undefined){
                $("#resutl-editorial").html(input);
            }
        }); 
    } 
    $(".search").click(function(event) {
        event.stopPropagation(); 
    });
     
});