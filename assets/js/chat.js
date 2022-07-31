export function users() {
    const chat = document.getElementById('chat');
    const allUsers = Array.from(document.getElementById('users').querySelectorAll('li'));
    let reciver;
/*NIJE ZAVRSENO!!!*/

    function sendMessage() {
        // const URL = './components/send.php';

        // let options = {
        //     method: 'POST',      
        //     body:{
        //         "reciver":"15",
        //         "text":"Primer"  
        //     },
        //   };
          
        //   fetch(URL, options)
        //   .then(response => response)
        //   .then(body => {
        //     console.log(body);
        //   });
   
    }

    allUsers.forEach(user => {
        user.addEventListener('click', () => {
            reciver = user.getAttribute('data-id');
            document.getElementById('messages-output').innerHTML=`
            <h3>${user.textContent}  ✉️:</h3>
            <ul class="message-list">
       
            </ul>
            `;
        })
    });

    chat.addEventListener('submit', (e) => {
        let text = document.getElementById('chatInput').value;
        console.log(text);
        console.log(reciver);
        $.ajax({
            type:'POST',
            url:'send.php',
            data:{
                reciver:reciver, text:text,
            },
            success:function(data){
             console.log(data);
            }
          });
        e.preventDefault();
    });
}