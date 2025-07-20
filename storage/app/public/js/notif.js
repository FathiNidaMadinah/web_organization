function createNotif(judul,body){
    new Notification(judul, {
        body: body
    });
}