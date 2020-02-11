document.addEventListener('DOMContentLoaded', () => {
    fetch('/api')
        .then((response) => response.json())
        .then((data) => {
            if (data.qty > 0) {
                creatCartQty(data.qty)
            }
        })
        .catch((error) => {
            console.log(error);
        });
});

function creatCartQty(qty) {
    const qtyEl = document.createElement('span');
    qtyEl.innerHTML = `[${qty}]`;
    qtyEl.className = 'cartQty';
    document.querySelector('.menu').lastChild.appendChild(qtyEl);
}

function updateCartQty(qty) {
    if (qty === 0) {
        document.querySelector('.cartQty').remove();
    } else {
        document.querySelector('.cartQty').innerHTML = `[${qty}]`;

    }
}

function newSession() {
    fetch('/api/newSession')
        .then(() => {
            document.location.href = '/';
        })
        .catch((err) => {
            console.log(err);
        })
}

const name = document.getElementById('name');
const feed = document.getElementById('feed');
const id = document.getElementById('feedback').dataset.id_good;
const btnOk = document.getElementById('ok');

function editEvent(elem) {
    elem.addEventListener('click', (evt) => {
        evt.preventDefault();
        const idFeed = evt.target.dataset.id_feed;
        fetch(`/apiFeed/edit/?id_feed=${idFeed}`)
            .then((response) => response.json())
            .then((data) => {
                name.value = data.name;
                feed.value = data.feed;
                btnOk.remove();
                let editBtn = document.getElementById('edit');
                if (editBtn == null) {
                    editBtn = document.createElement('button');
                    editBtn.setAttribute('id', 'edit');
                    editBtn.innerText = 'Редактировать';
                    feed.insertAdjacentElement('afterend', editBtn);
                    editBtn.addEventListener('click', (evt) => {
                        fetch(`/apiFeed/save/?id_feed=${idFeed}`, {
                            method: 'POST',
                            body: JSON.stringify({
                                name: name.value,
                                feed: feed.value,
                                headers: {
                                    'Content-type': 'application/json',
                                },
                            })
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.status) {
                                    evt.target;
                                    editBtn.remove();
                                    feed.insertAdjacentElement('afterend', btnOk);
                                    elem.previousElementSibling.innerHTML =
                                        `<span><strong>${name.value}</strong>: ${feed.value}</span>`;
                                    name.value = '';
                                    feed.value = '';
                                }
                            })
                            .catch((err) => {
                                console.log(err);
                            })
                    })
                }

            })
    })
}

function addEvent(elem) {
    elem.addEventListener('click', () => {
        fetch('/apiFeed/add', {
            method: 'POST',
            body: JSON.stringify({
                name: name.value,
                feed: feed.value,
                id_good: id,
            }),
            headers: {
                'Content-type': 'application/json',
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    const feedElem = document.createElement('div');
                    feedElem.innerHTML = `<span><strong>${name.value}</strong>: ${feed.value}</span>
                                          <a href="/" class="edit" data-id_feed="${data.id}" >[править]</a>
                                          <a href="/" class="del" data-id_feed="${data.id}">[X]</a>`;
                    document.querySelector('.feedback_list').insertAdjacentElement('afterbegin', feedElem);
                    name.value = '';
                    feed.value = '';
                    const editElem = document.querySelector('.edit');
                    editEvent(editElem);
                    const delElem = document.querySelector('.del');
                    delEvent(delElem);
                }
            })
            .catch((err) => {
                console.log(err);
            })
    })
}

function delEvent(elem) {
    elem.addEventListener('click', (evt) => {
        evt.preventDefault();
        const id_feed = elem.dataset.id_feed;
        fetch(`/apiFeed/del/?id_feed=${id_feed}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    elem.parentElement.remove();
                }
            })
    })
}


