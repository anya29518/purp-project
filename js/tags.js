/* <div class="tag">
<span>Javascript</span>
<span class="material-icons">close</span>
</div> */

const tagContainer = document.querySelector('.tag-container');
const input = document.querySelector('.tag-container input');

var tags = [];

function  createTag(label) {
    const div = document.createElement('div');
    div.setAttribute('class', 'tag');
    const span = document.createElement('span');
    span.innerHTML = label;
    const closeBtn = document.createElement('i');
    closeBtn.setAttribute('class', 'material-icons');
    closeBtn.setAttribute('data-item', label);
    closeBtn.innerHTML = 'close';

    div.appendChild(span);
    div.appendChild(closeBtn);
    return div;


}

function reset(){
    document.querySelectorAll('.tag').forEach(function(tag){
        tag.parentElement.removeChild(tag);
    })
}

function testUnique(A)
{   
    let n = A.length;
    for (let i = 0; i < n-1; i++)
     { for (let j = i+1; j < n; j++)
        { if (A[ i ] === A[j]) return false; }
     }
    return true;
}

function addTags(){
    reset();

    tags.slice().reverse().forEach(function(tag){
        
        
        if(tag!=''){
            const input = createTag(tag);
            tagContainer.prepend(input);
        }
      
        
        
    })  
}



input.addEventListener('keyup', function(e){
    if(e.key == 'Enter'){
        tags.push(input.value);
        addTags();
        input.value = '';
    }
})

document.addEventListener('click', function(e){
    if(e.target.tagName == 'I'){
        const value = e.target.getAttribute('data-item');
        const index = tags.indexOf(value);
        tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
        addTags();
    }
})
