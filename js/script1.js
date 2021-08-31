


$("#productType ").change(function(){
      if ($('#productType option:selected').text() == 'DVD') {
$("#form_description").html('<div class="alert alert-primary" id="description"><span> Please, provide size in MB</span>'+
'</div>'+'<div class="form-group row"><label  class="col-sm-3 col-form-label">Size(MB)</label><div class="col-sm-9">'+
'<input type="text" class="form-control" id="size" name="size"  form="product_form"></div></div>');

      } else if  ($('#productType option:selected').text() == 'Furniture') {
$("#form_description").html('<div class="alert alert-primary" id="description"><span> Please, provide dimensions in HxWxL format </span>'+
'</div>'+'<div class="form-group row"><label  class="col-sm-4 col-form-label">Height (CM)</label><div class="col-sm-8"><input type="text" class="form-control" id="height" name="height"  form="product_form"></div></div>'+
'<div class="form-group row"><label  class="col-sm-4 col-form-label">Width (CM)</label><div class="col-sm-8"><input type="text" class="form-control" id="width" name="width"  form="product_form"></div></div>'+
'<div class="form-group row"><label  class="col-sm-4 col-form-label">Length (CM)</label><div class="col-sm-8"><input type="text" class="form-control" id="length" name="length"  form="product_form"></div></div>');
  } else if  ($('#productType option:selected').text() == 'Book') {
$("#form_description").html('<div class="alert alert-primary" id="description"><span> Please, provide weight in KG </span>'+
'</div>'+'<div class="form-group row"><label  class="col-sm-3 col-form-label">Weight(KG)</label><div class="col-sm-9"><input type="text" class="form-control" id="weight"  name="weight" form="product_form""></div></div>');
	} else {
      $("#form_description").html('');
    }});

//	$('#save-button').click(function(){
$(document).ready(function()
{
  $("#product_form").validate(
    {
      rules: {
        name: {
            required: true,
               },
        price: {
                required: true,
                number:true
               },
        sku: {
                required: true,
                remote :{
                  url:"/check/"	,
                  type:"post",
                  data:{
                    sku: function()
                    {return $( "#sku" ).val();}
                      }
                    }
              },
        weight: {
                  required: true,
                  number:true
              },
        width: {
                  required: true,
                  number:true
                },
        height: {
                   required: true,
                   number:true
                 },
        length: {
                  required: true,
                  number:true
                 },
        size: {
                  required: true,
                  number:true
               },
        myselect: {
                    required: true
                          
                  },
             },
      messages: {
          price: {
                  number:"Please, provide the data of indicated type"
                  },
          size: {
                  number:"Please, provide the data of indicated type"
                  },
          length: {
                  number:"Please, provide the data of indicated type"
                },
          width: {
                  number:"Please, provide the data of indicated type"
                },
          height: {
                  number:"Please, provide the data of indicated type"
                  },
          weight: {
                  number:"Please, provide the data of indicated type"
                   },
          sku: {
                remote: "This sku is not available"
               },
              },
       
      errorPlacement: function(error, element)
      {   
              $('#errors').html('<div class="alert alert-danger" id="errors">'+
              '<span>Please, submit required data </span>	</div>');
            if (element.attr("name") == "name") error.insertAfter($("input[name=name]"));
            if (element.attr("name") == "sku") error.insertAfter($("input[name=sku]"));
            if (element.attr("name") == "price") error.insertAfter($("input[name=price]"));
            if (element.attr("name") == "weight") error.insertAfter($("input[name=weight]"));
            if (element.attr("name") == "height") error.insertAfter($("input[name=height]"))
            if (element.attr("name") == "size") error.insertAfter($("input[name=size]"))
            if (element.attr("name") == "width") error.insertAfter($("input[name=width]"))
            if (element.attr("name") == "length") error.insertAfter($("input[name=length]"))
            if (element.attr("name") == "myselect") error.insertAfter($("select[name=myselect]"))
        },

    });
 
});
