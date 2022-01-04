let task;
let statut;
function send () {

    let doner;
    let datenow;
    $.ajax({
        type: "POST",
        url: "taskadd.php",
        data: {task: task, statut: statut},
    })

        .done(function (reponse) {
            // console.log(reponse)
            //
            // reponse=reponse.replaceAll("[","");
            // reponse=reponse.replaceAll("]","");
            // reponse=reponse.replace(/['"]+/g, '');
            // doner=reponse.split(',');
            //
            // let Table = $("#DataTable").DataTable();
            //
            // doner[2] = doner[2].replaceAll("-", "/");
            // datenow = doner[2].split("/");
            // datenow=datenow[2]+"/"+datenow[1]+"/"+datenow[0];
            let table=document.getElementById('rowTable');
            let text =$('#TextTask').val();
            if (text=="")
            console.log(text);
            table.insertAdjacentHTML('afterend', `

                    <tr>

                        <td><input type="checkbox" id="task1"></td>
                        <td>${text}</td>
                        <td>in progress</td>
                        <td><button  type="button" class="btn btn-outline-danger">delete</button></td>

                    </tr>`);





        })
        .fail(function (jqXHR, textStatus) {
            alert(textStatus);
        });

}

$('#test').on('click', function(){
    let aze=$(this).parent().attr('id');

    alert($("#"+aze).parent().attr('id'));
});

