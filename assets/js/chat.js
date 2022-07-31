export function users() {
    const chat = document.getElementById('chat');
    const allUsers = Array.from(document.getElementById('users').querySelectorAll('li'));
    let reciver;
/*NIJE ZAVRSENO!!!*/



    function fetchServer() {
        const URL = './components/messages.php';

        let options = {
            method: 'GET',      
            headers: {}
          };
          
          fetch(URL, options)
          .then(response => response.json())
          .then(body => {
            console.log(body);
          });
  
    }


    allUsers.forEach(user => {
        user.addEventListener('click', () => {
            reciver = user.getAttribute('data-id');
        })
    });


    chat.addEventListener('submit', (e) => {
        let text = document.getElementById('chatInput').value;
        const forSending={
            reciver:reciver,
            text:text
        }
        const jsonString=JSON.stringify(forSending);
        console.log(jsonString);
        e.preventDefault();
    });
}

