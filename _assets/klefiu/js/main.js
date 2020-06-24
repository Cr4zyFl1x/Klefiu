function closeStatusMSG(id = "statusMSG") {
    if (document.getElementById(id)) {
        document.getElementById(id).innerHTML = "";
    } else {
        console.log('Internal error!');
    }
}