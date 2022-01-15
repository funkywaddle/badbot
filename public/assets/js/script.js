document.getElementById("sentNotification").setAttribute("hidden", "");

function getHeaders() {
    return new Headers({
        "Content-Type": "application/json",
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    });
}

buttonPress = btn => {
  let regex = /(<([^>]+)>)/ig;
  let command = btn.innerHTML.replace(regex, " ");
  let $message = { command: '!'+command };
  document.getElementById("sentNotification").removeAttribute("hidden");
  btn.disabled = true;
  fetch("/sendmessage", {
    headers: getHeaders(),
    method: "post",
    body: JSON.stringify($message)
  })
    .then(res => {
      return res.json();
    })
    .finally(() => {
      setTimeout(() => {
        document.getElementById("sentNotification").setAttribute("hidden", "");
        btn.disabled = false;
      }, 5000);
    });
};

sendCommand = text => {
    let $message = { command: '!' + text };

    fetch("/sendmessage", {
        headers: getHeaders(),
        method: "post",
        body: JSON.stringify($message)
    })
    .then(res => { return res.json(); });
};

function updateButton(id, value, button) {
  let btn = document.getElementById(id);
  btn.innerText = button + ' ' + value;
}
