function load(){
    let nb=0;
    $.ajax({
        type: "POST",
        url: "loadTask.php",
    })

        .done(function (reponse) {
            reponse=reponse.replaceAll('[', '');//remove all [ from reponse
            reponse=reponse.replaceAll(']', '');
            reponse=reponse.replaceAll('"', '');

            reponse=reponse.split(',');

            $.each(reponse ,function(){ //add task

                let table=document.getElementById('rowTable');
                let text =reponse[nb];
                nb++;

                table.insertAdjacentHTML('beforeend', `  


                <tr>
                    <td>
                        <input type="checkbox" class="status">
                    </td>
                    <td>${text}</td>
                  
                    <td class="deltask"><button  type="button" class="btndelete btn btn-outline-danger">delete</button></td>

                </tr>`);
            } )

            $('.btndelete').on('click',function(){

                let rowName=$(this).parent().parent();

                let task =rowName.children().eq(1).text(); //function to delete task on click
                rowName.remove();


                $.ajax({
                    type: "POST",
                    url: "deleteTask.php",
                    data: {task: task},
                })
            });
            $('.status').on('change',function(){
                if ($(this).is(':checked')) {
                    let rowStatus=$(this).parent().parent();
                    let task =rowStatus.children().eq(1).text(); //function to change status
                    $.ajax({
                        type: "POST",
                        url: "deleteTask.php",
                        data: {task:task},
                    })
                }
            });

        })
        .fail(function (jqXHR, textStatus) {
            alert(textStatus);
        });
}



$(document).ready(function () {
    load();//load all the task
})








function addTask () {
    let text =$('#TextTask').val();
    $.ajax({
        type: "POST",
        url: "taskadd.php",
        data: {text: text},
    })

        .done(function (reponse) {

            let table=document.getElementById('rowTable');
            if (text==""||text==" "){
                text="undefine";
            }
            table.insertAdjacentHTML('beforeend', `


<tr>
                    <td>
                        <input type="checkbox" class="status">
                    </td>
                    <td>${text}</td>
                  
                    <td class="deltask"><button  type="button" class="btndelete btn btn-outline-danger">delete</button></td>

                </tr>`);
            $('.btndelete').unbind('click');
            $('.btndelete').on('click',function(){

                let rowName=$(this).parent().parent();
                let task =rowName.children().eq(1).text(); //function to delete task on click
                rowName.remove();


                $.ajax({
                    type: "POST",
                    url: "deleteTask.php",
                    data: {task: task},
                })
            });
            $('.status').unbind('change');
            $('.status').on('change',function(){
                if ($(this).is(':checked')) {
                    let rowStatus=$(this).parent().parent();
                    console.log(rowStatus)
                    let task =rowStatus.children().eq(1).text(); //function to change status
                    $.ajax({
                        type: "POST",
                        url: "deleteTask.php",
                        data: {task:task},
                    })
                }
            });

        })
        .fail(function (jqXHR, textStatus) {
            alert(textStatus);
        });

}

