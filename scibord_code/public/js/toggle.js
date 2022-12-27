var toggleBtn = document.querySelectorAll('.toggle-btn');
handleToggle();
toggleCategoryFilterMenu();

function handleToggle()
{
    toggleBtn.forEach(btn=>{
        btn.addEventListener('click', function(){
            document.querySelector('.navbar').classList.toggle('d-none')
        });
    })    
}


function toggleCategoryFilterMenu()
{
    document.getElementById('category-btn').addEventListener('click', function(event){
        event.stopPropagation();
        document.querySelector('.cat-option').classList.toggle('d-none');
    });

    closeModuleOnWindowClicked('.cat-option');
}



function closeModuleOnWindowClicked(moduleClassName)
{
    window.addEventListener('click', function(){
        if(!document.querySelector(moduleClassName).classList.contains('d-none'))
        {
            document.querySelector(moduleClassName).classList.add('d-none');
        }
    });
}