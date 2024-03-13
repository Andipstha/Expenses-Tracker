
deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
        console.log("edit",);
        sno = e.target.id.substr(1,);

        if (confirm("Are you sure you want to delete this note?")) {
            console.log("yes");
            window.location = `/index.php?delete=${sno}`;

        }
        else {
            console.log("no");
        }

    })
})


document.addEventListener('DOMContentLoaded', function() {
    var successAlert = document.getElementById('success-alert');

    if (successAlert) {
        setTimeout(function() {
            successAlert.remove(); 
        }, 5000); 
    }
});