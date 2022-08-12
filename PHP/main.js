$(document).ready(function(){
    $(".btnedit").click(e=>{
      let textval= dispdata(e);

     let id=$("input[name*='book_id']");
     let bookname=$("input[name*='book_name']");
     let bookpub=$("input[name*='book_pub']");
     let price=$("input[name*='book_price']");
     
     id.val(textval[0]);
     bookname.val(textval[1]);
     bookpub.val(textval[2]);
     price.val(textval[3].replace("$"," "));


    })     
});

function dispdata(e)
{
    let id=0;
    const td=$("#tbody tr td");
    let textval=[];

    for(const value of td)
    {
       if(value.dataset.id==e.target.dataset.id)
       {
        textval[id++]=value.textContent;
       }
    }
    return textval;
     
}