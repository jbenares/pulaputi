
function check_gamecat(val){
    var gamecat = val.split("_");

    var id = gamecat[0];
    var outcomes = gamecat[1];
    var choices = gamecat[2];
    var outcomelist = document.getElementById('outcomelist');
    var newRowAdd = document.createElement('div');
    $('.added').remove();
    if(choices.length == 0){
       
        for(x=0;x<outcomes;x++){
            var y=x+1;
           var field_name = "choice_array_"+x;
           var placeholder = "Choice "+y;
            newRowAdd.innerHTML +=
            '<div class="flex flex-col mb-2 added"><div class=" relative "><input type="text" id="+field_name+" name="'+field_name+'"  placeholder="'+placeholder+'" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" /></div></div>';
        }
        outcomelist.append(newRowAdd);
    } else {
       
        $('.added').remove();
    }
 

}

