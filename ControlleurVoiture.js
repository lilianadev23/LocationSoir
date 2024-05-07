$(document).ready(function(){
    var voitureDateTable = $('#listvoiture').DataTable({

    'processing':true,
    'ajax':{
      'url':'MODEL/voiture.php'
    },
    'columns':[
      {data:'immatriculation'},
      {data:'marque'},
      {data:'Modele'},
      {data:'Cylindree'},
      {data:'dateachat'},
      {data:'action'},
    ]   


  });

  $('#listvoiture').on('click','.deleteUser',function(){
       let id = $(this).data('id');
       let deleteConfirm = confirm("voulez vous vraiment supprimer cette Voiture ?");
       if(deleteConfirm==true)
       {
         $.ajax({
           url:'Model/Voiture.php',
           type:'post',
           data:{question:2,id:id},
           success: function(response){
              if(response==1)
              {
                alert("voiture supprimer  Avec Succéss");
                voitureDateTable.ajax.reload()

              }
            }
         })
       }
       else{
        alert("operation Annuler");
       }
  });
})