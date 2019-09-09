/**
 * Created by User on 4/9/2017.
 */

function colorchange() {
    var r1 = document.getElementById("min").value;
    var r2 = document.getElementById("max").value;
    document.getElementById("min_p").innerHTML='$'+r1;
    document.getElementById("max_p").innerHTML="$"+r2;
}

$(document).ready(function(){

    $(".btn").click(function(){

        var p_id= $(this).attr("id");
        var total=$(this).attr("value");
        var q_id;
        $(".qty").each(function(){
            q_id=$(this).attr("id");
            if(p_id==q_id)
            {
                var qty= $(this).val();
                if(qty<0)
                {
                    alert("Number Should Be Greater Than 0 ");

                }
                else if(isNaN(qty))
                {
                    alert("Should  be Number");

                }
                else if(qty=="")
                {
                    alert("should not be empty value");
                }
                else
                {

                    $.ajax({

                        type:'get',
                        dataType:'html',
                        url:"update/cart/"+p_id,
                        data:{qty:qty},
                        success:function(data)
                        {

                            document.getElementById('success').innerHTML=data;
                            $("#ss").show();
                            document.getElementById('success').style.display='block';
                          window.location='cart';
                           // console.log(response);


                        }
                    });
                }
            }

        });
    });

});




