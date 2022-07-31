export function users() {
    const chat = document.getElementById('chat');
    const allUsers = Array.from(document.getElementById('users').querySelectorAll('li'));
    let reciver;
/*NIJE ZAVRSENO!!!*/



    function fetchServer(data) {
        const URL = './components/messages.php';

        let options = {
            method: 'POST',      
            body:data,
          };
          
          fetch(URL, options)
          .then(response => response.stringify())
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
        fetchServer(jsonString);
        e.preventDefault();
    });
}

