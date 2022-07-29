export function users() {
    const chat = document.getElementById('chat');
    const allUsers = Array.from(document.getElementById('users').querySelectorAll('li'));



    function fetchServer() {
        fetch('./components/messages.php')
            .then((response) => response.json())
            .then((data) => console.log(data));
    }


    allUsers.forEach(user => {
        user.addEventListener('click', () => {
            console.log(user.getAttribute('data-id'));
        })
    });



    chat.addEventListener('submit', (e) => {
        fetchServer();
        console.log('submit');
        e.preventDefault();
    });
}


