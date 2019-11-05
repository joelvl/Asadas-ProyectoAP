$(document).ready(function(e){
$("#select-beast").change(function () {
                                
                              $("#select-beast option:selected").each(function () {
                                var id_medida = $(this).val();
                                alert(id_medida);

                               $.ajax({
                                        type: "post",
                                        url: "productos.php",
                                        data: {MedidaA: id_medida},      
                                        success: function (response){
                                        alert('success'); 
                                        }
                                    });
                    
                                       
                               });

                              })
});