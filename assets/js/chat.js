export function users() {
    const chat = document.getElementById('chat');
    const allUsers = Array.from(document.getElementById('users').querySelectorAll('li'));
    let reciver;
    /*NIJE ZAVRSENO!!!*/


    //resetuje aktivne korisnike svaki put kada se pozove
    function clearActive(users) {
        users.forEach(user => {
            if (user.classList.contains("active")) {
                user.classList.remove("active");
            }
        });
    }


    //svim trenutno aktivnim korisnicima dodajemo osluskivac dogadjaja
    allUsers.forEach(user => {

        user.addEventListener('click', (e) => {
            reciver = user.getAttribute('data-id');
            //resetuje aktivne korisnike
            clearActive(allUsers);
            e.target.classList.add("active");
            document.getElementById('messages-output').innerHTML = `
            <h3>${user.textContent}  ✉️:</h3>
            <ul id="messageOutput" class="message-list">
       
            </ul>
            `;
        })
    });

    //ispisuje sve poruke sa baze
    function outputMessages(messageFromDatabase) {
        messageFromDatabase=JSON.parse(messageFromDatabase);
   for (const msg of messageFromDatabase) {
    document.getElementById('messageOutput').innerHTML +=`
    <li>${reciver==msg.reciver?"":"Me:"} ${msg.text}</li>
    `;

   }
    }

    chat.addEventListener('submit', (e) => {
        let text = document.getElementById('chatInput').value;
        console.log(text);
        console.log(reciver);

        $.ajax({
            type: 'POST',
            url: 'send.php',
            data: {
                reciver: reciver, text: text,
            },
            success: function (data) {
                outputMessages(data);
            }
        });

        e.preventDefault();
    });
}