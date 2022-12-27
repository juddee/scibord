var programList = document.querySelector('#program-cards');
// programList.innerHTML ='';
var loadBtn = document.querySelector('.loadBtn');
var active_status_bar = document.getElementById('active_status_bar').value;
// console.log(active_status_bar);
var CurrentPage=0;
var postPerPage = 20;
var totalCards;
var cardSkeleton = document.querySelector('.card-skeleton');
programList.innerHTML='';
function loadPrograms()
{
    loadBtn.innerHTML ="loading.....";
    cardSkeleton.classList.toggle('d-none');
    new Promise((resolve, reject) => 
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            // if response True update DOM
            if (this.readyState == 4 && this.status == 200) 
            {
                var responds = JSON.parse(this.response);
                // console.log(responds);
                resolve(responds);
            }// else don't update DOM
        };
        xmlhttp.open("GET", window.location.origin+"/get-programs?q="+active_status_bar, true);
        xmlhttp.send();
    })
    .then
    ((responds)=>
      {
        
          totalCards = responds.length;
          var startPost =CurrentPage * postPerPage;
          var endPost = startPost + postPerPage;
          for (let i = startPost; i < endPost; i++) 
          {
              if(i < totalCards)
              {
                  // console.log(responds[i]['title']);
                  var call_to_action = [];
                  var call_to_action_btns ;
                  if(responds[i]['status'] == 0)
                  {
                      call_to_action['link'] = "#";
                      call_to_action['title'] = "Notify Me";
                      call_to_action_btns = `
                          <a href="${responds[i]['link']}" class="no-decoration btn2" target="_blank">Read more</a>
                          <a href="${['link']}" class="no-decoration btn2" target="_blank">${call_to_action['title']}</a>
                      `;
                  }else
                  {
                      call_to_action['link'] = responds[i]['link'];
                      call_to_action['title'] = "Register Now";
                      call_to_action_btns = `
                          <a href="${['link']}" class="no-decoration btn2" target="_blank">${call_to_action['title']}</a>
                      `;

                  }
                  
                  programList.innerHTML += `
                  <div class="card">
                      <p>${responds[i]['title']}</p>
                      <p>By: ${responds[i]['organized_by']}</p>
                      <p>${responds[i]['program_info']}</p>
                      <div class="flex justify-content-between">
                          <div>
                              <a class="no-decoration btn1">${responds[i]['category_name']}</a>
                              ${call_to_action_btns}
                              
                          </div>
                          <div class="flex">
                              <!-- <img src="assests/icons/share-svgrepo-com.svg" alt="share-btn" id="button" data-trigger="tooltip4"  aria-describedby="tooltip">
                              <img src="assests/icons/menu-svgrepo-com.svg" alt="menu" id="cardMenu"> -->
                          </div>
                      </div>
                  </div>
                  `;
                  
              }else{
                  loadBtn.classList.add('d-none');
              }
              
          }
          CurrentPage++;
          
        loadBtn.innerHTML ="Load 20 more programs 🚀";
        cardSkeleton.classList.toggle('d-none');
      }
      )
    .catch(console.error.bind(null, 'Something bad happened: '))

}

loadPrograms();
// console.log(window.location.origin);

loadBtn.addEventListener('click', loadPrograms);
