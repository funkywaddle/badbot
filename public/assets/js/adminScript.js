buttonPress = btn => {
    let regex = /(<([^>]+)>)/ig;
    let command = btn.innerHTML.replace(regex, " ");
    let cat_id = btn.dataset.id;

    fetch("/admin/categories/" + cat_id + "/toggleShow", {
        method: "get",
    })
    .then(res => {
        let text = 'Shown';
        let cls = 'btn-success';
        let rmcls = 'btn-danger';

        if (command === 'Shown') {
            text = 'Not Shown';
            cls = 'btn-danger';
            rmcls = 'btn-success';
        }

        btn.innerText = text;
        btn.classList.replace(rmcls, cls);
    });
};
