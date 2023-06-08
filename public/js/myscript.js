

function onlyNumberKey(evt) {             
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}


function getMaxBet(count){
    var curr_wallet = parseFloat(document.getElementById('curr_wallet').value);
    var slot_price = parseFloat(document.getElementById('slot_price_'+count).value);

    var maxbet = Math.floor(curr_wallet/slot_price);
    document.getElementById("bet_"+count).value = maxbet;

    var totalprice= slot_price*maxbet;
    var price = totalprice.toFixed(2);
    document.getElementById("totalbet_"+count).innerHTML = price;
}

function betChecker(val,count){
    var curr_wallet = parseFloat(document.getElementById('curr_wallet').value);
    var slot_price = parseFloat(document.getElementById('slot_price_'+count).value);

    var maxbet = Math.floor(curr_wallet/slot_price);

    var len = val.length;
    if(len>0){
        if(val>maxbet){
            alert("Warning: Insufficient wallet amount.");
            document.getElementById('bet_'+count).value="";
            document.getElementById("totalbet_"+count).innerHTML = "0.00";
        } else if(val<=0){
            alert("Warning: Invalid value.");
            document.getElementById('bet_'+count).value="";
            document.getElementById("totalbet_"+count).innerHTML = "0.00";
        } else {
            var totalprice= slot_price*val;
            var price = totalprice.toFixed(2);
            document.getElementById("totalbet_"+count).innerHTML = price;
        }
    }

}

function valueChecker(val, count, choicecount){
    var max = parseInt(document.getElementById('max_'+count).value); 
    var min = parseInt(document.getElementById('min_'+count).value); 
    if(val>max || val < min){
        alert('Waring: Invalid value.');
        document.getElementById('choice_'+count+'_'+choicecount).value="";
    }

    gfg_check_duplicates(count);

}

function gfg_check_duplicates(count) {
 
    var loop_choices = document.getElementById('choice_count_'+count).value;
    var myarray = [];
    for (i = 1; i <= loop_choices; i++) {
      myarray[i] = 
       document.getElementById('choice_'+count+'_'+i).value;
    }
    for (i = 1; i <= loop_choices; i++) {
        for (j = i + 1; j <= loop_choices; j++) {
        if (i == j || myarray[i] == "" || myarray[j] == "") 
                continue;
            if (myarray[i] == myarray[j]) {
            document.getElementById("status_" +count+"_"+i).innerHTML = "Warning: Duplicate values";
            document.getElementById("status_" +count+"_"+j).innerHTML = "Warning: Duplicate values";
           
          
            } else {
                document.getElementById("status_" +count+"_"+i).innerHTML = "";
                document.getElementById("status_" +count+"_"+j).innerHTML = "";
                
            }
        }
    }
}

function timer(count, id){
   // var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();
    var max = document.getElementById('date_end_'+count).value; 
    var countDownDate = new Date(max).getTime()-600000;   //minus 10 minutes
 
    var x = setInterval(function() {
   
    var now = new Date().getTime();

    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  
    
    var time_disp =  days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
    
     document.getElementById("demo_"+count).innerHTML = time_disp;
  
    if (distance < 0) {
        clearInterval(x);
      
      // document.getElementById("event_block_"+count).style.display = 'none'; 
      //document.querySelector('#join_button_'+count).disabled = true;
      document.getElementById("join_button_"+count).disabled = true; 
      document.getElementById("join_button_"+count).style.backgroundColor = '#C8C8C8'; 
      document.getElementById("join_button_"+count).innerHTML= "This event is locked.";
      document.getElementById("demo_"+count).innerHTML= "";
        $.ajax({
            url: '/closeEvent/'+id,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data)
            {
                
                alert(data);
            }
        });
       
    }
    }, 1000);

    
}

function check_gamecat(val){
    var gc_val = document.getElementById('game_category').value;
    var gamecat = gc_val.split("_");

    var id = gamecat[0];
    var outcomes = gamecat[1];
    var choices = gamecat[2];
 
    var outcomelist = document.getElementById('outcomelist');
    var outcomeDD = document.getElementById('outcomeDD');
    var outcomeDD2 = document.getElementById('outcomeDD2');
    var newRowAdd = document.createElement('div');
    $('.added').remove();
    if(val==1){
       
        if(choices.length == 0){
        
            for(x=1;x<=outcomes;x++){
                
            var field_name = "choice_array_"+x;
            var placeholder = "Question "+x;
                newRowAdd.innerHTML +=
                '<div class="flex flex-col mb-2 added"><div class=" relative "><input type="text" id="+field_name+" name="'+field_name+'"  placeholder="'+placeholder+'" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" /></div></div>';
            }
            outcomelist.append(newRowAdd);
        } else {
           
            $('.added').remove();
        }
    } else{
    
        if(outcomes == 3){
          
            if(choices.length == 0){
                outcomeDD.style.display = "block";
                outcomeDD2.style.display="none";
                var x= 1;
                $.ajax({
                    url: '/getQuestions/'+id,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                    if(data){
                            var field_name = "choice_array_"+x;
                            $('select[name="choice_array_1"]' ).append('<option value="">Select Question 1</option>');
                            $('select[name="choice_array_2"]' ).append('<option value="">Select Question 2</option>');
                            $('select[name="choice_array_3"]' ).append('<option value="">Select Question 3</option>');
                            $.each(data, function(key, ques){
                                $('select[name="choice_array_1"]' ).append('<option value="'+ ques.question +'">' + ques.question+ '</option>');
                                $('select[name="choice_array_2"]' ).append('<option value="'+ ques.question +'">' + ques.question+ '</option>');
                                $('select[name="choice_array_3"]' ).append('<option value="'+ ques.question +'">' + ques.question+ '</option>');
                            });
                    }
                }
                });

            } else {
                outcomeDD.style.display = "none";
                $('.added').remove();
            }
        } else if(outcomes == 2){
           
            $('#choice_array_1_xx').attr('name', 'choice_array_1'); 
            $('#choice_array_2_xx').attr('name', 'choice_array_2'); 
            document.getElementById('choice_array_1_xx').id = 'choice_array_1';
            document.getElementById('choice_array_2_xx').id = 'choice_array_2';
       

            if(choices.length == 0){
                outcomeDD2.style.display = "block";
                outcomeDD.style.display = "none";
                var x= 1;
                $.ajax({
                    url: '/getQuestions/'+id,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                    if(data){
                            var field_name = "choice_array_"+x;
                            $('select[name="choice_array_1"]' ).append('<option value="">Select Question 1</option>');
                            $('select[name="choice_array_2"]' ).append('<option value="">Select Question 2</option>');
                            $.each(data, function(key, ques){
                                $('select[name="choice_array_1"]' ).append('<option value="'+ ques.question +'">' + ques.question+ '</option>');
                                $('select[name="choice_array_2"]' ).append('<option value="'+ ques.question +'">' + ques.question+ '</option>');
                            });
                    }
                }
                });

            } else {
                outcomeDD.style.display = "none";
                $('.added').remove();
            }

        }
    }
 
}

function resetDD(){
    var select1 = document.getElementById("choice_array_1");
    var length1 = select1.options.length;
    for (i = length1-1; i >= 0; i--) {
    select1.options[i] = null;
    }
    var select2 = document.getElementById("choice_array_2");
    var length2 = select2.options.length;
    for (j = length2-1; j >= 0; j--) {
    select2.options[j] = null;
    }
    var select3 = document.getElementById("choice_array_3");
    var length3 = select3.options.length;
    for (k = length3-1; k >= 0; k--) {
    select3.options[k] = null;
    }
    document.getElementById("description_1").innerHTML = "";
    document.getElementById("description_2").innerHTML = "";;
    document.getElementById("description_3").innerHTML = "";;
}
function checkamount(val, count){
    
    var userwallet = parseFloat(document.getElementById('user_wallet').value);
    if(val>userwallet){
        document.getElementById('wallet_error_'+count).innerHTML =  "Top-up to add more wallet amount. Current wallet: P"+ userwallet.toFixed(2);
        document.getElementById("submit_"+count).disabled = true; 
        document.getElementById("submit_"+count).style.backgroundColor = '#abb2b9'; 
    } else {
        document.getElementById('wallet_error_'+count).innerHTML =  "";
        document.getElementById("submit_"+count).disabled = false; 
        document.getElementById("submit_"+count).style.backgroundColor = '#1A56DB'; 
    }
}

function checkdudplicates(val, number){

 
        var List1 = document.getElementById("choice_array_1");
        var sortList1 = List1.options[List1.selectedIndex].text;

        var List2 = document.getElementById("choice_array_2");
        var sortList2 = List2.options[List2.selectedIndex].text;

        var List3 = document.getElementById("choice_array_3");
        var sortList3 = List3.options[List3.selectedIndex].text;

    
        if(sortList1 == sortList2 || sortList1 == sortList3 || sortList2 == sortList3){
           document.getElementById("question_error_" +number).innerHTML = "Warning: Duplicate question";
           document.getElementById("createevent").disabled = true; 
           document.getElementById("createevent").style.backgroundColor = '#abb2b9'; 
        } else {

           
            document.getElementById("question_error_" +number).innerHTML="";
            document.getElementById("createevent").disabled = false; 
            document.getElementById("createevent").style.backgroundColor = '#1A56DB'; 

            var val2 = encodeURI(val);
            $.ajax({
                url: '/getdescription/'+val2,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                success:function(data)
                {
                    document.getElementById("description_" +number).innerHTML = data;
                }
              
            });

        }
   
}

function checkRefCode(val, userid){
   
    $.ajax({
        url: '/checkRefCode/'+val+'/'+userid,
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        success:function(data)
        {
         //alert(data); 
            if(data=='invalid'){
                document.getElementById("refcode_message").innerHTML = "Invalid! You are trying to transfer wallet to yourself.";
                $("#refcode_message").addClass("text-red-700");
                $("#refcode_message").removeClass("text-green-700");
                document.getElementById("transfernow").disabled = true; 
                document.getElementById("transfernow").style.backgroundColor = '#abb2b9'; 
            } else {
                if(data>0){
                    document.getElementById("refcode_message").innerHTML = "Referral code/Mobile number verified!";
                    $("#refcode_message").addClass("text-green-700");
                    $("#refcode_message").removeClass("text-red-700");
                    document.getElementById("transfernow").disabled = false; 
                    document.getElementById("transfernow").style.backgroundColor = '#1A56DB'; 
                } else {
                    document.getElementById("refcode_message").innerHTML = "Referral code/Mobile number unverified! User does not exist.";
                    $("#refcode_message").addClass("text-red-700");
                    $("#refcode_message").removeClass("text-green-700");
                    document.getElementById("transfernow").disabled = true; 
                    document.getElementById("transfernow").style.backgroundColor = '#abb2b9'; 
                }
            }
        }
      
    });
}


function checkRefCode_submit(){
    var ref_code = document.getElementById("ref_code");
    $.ajax({
        url: '/checkRefCode_submit/'+ref_code,
        type: "GET",
        data : {"_token":"{{ csrf_token() }}"},
        success:function(data)
        {
         //alert(data); 
            if(data=='invalid'){
                document.getElementById("refcode_message").innerHTML = "Invalid! You are trying to transfer wallet to yourself.";
                $("#refcode_message").addClass("text-red-700");
                $("#refcode_message").removeClass("text-green-700");
                
               
            } else {
                if(data>0){
                    document.getElementById("refcode_message").innerHTML = "Referral code/Mobile number verified!";
                    $("#refcode_message").addClass("text-green-700");
                    $("#refcode_message").removeClass("text-red-700");
                    
                } else {
                    document.getElementById("refcode_message").innerHTML = "Referral code/Mobile number unverified! User does not exist.";
                    $("#refcode_message").addClass("text-red-700");
                    $("#refcode_message").removeClass("text-green-700");
                   
                }
            }
        }
      
    });
}

function confetti(){
    tsParticles.load("tsparticles", {
        "fullScreen": {
            "zIndex": 1
        },
        "particles": {
            "color": {
            "value": [
                "#FFFFFF",
                "#FFd700"
            ]
            },
            "move": {
            "direction": "bottom",
            "enable": true,
            "outModes": {
                "default": "out"
            },
            "size": true,
            "speed": {
                "min": 1,
                "max": 3
            }
            },
            "number": {
            "value": 500,
            "density": {
                "enable": true,
                "area": 800
            }
            },
            "opacity": {
            "value": 1,
            "animation": {
                "enable": false,
                "startValue": "max",
                "destroy": "min",
                "speed": 0.3,
                "sync": true
            }
            },
            "rotate": {
            "value": {
                "min": 0,
                "max": 360
            },
            "direction": "random",
            "move": true,
            "animation": {
                "enable": true,
                "speed": 60
            }
            },
            "tilt": {
            "direction": "random",
            "enable": true,
            "move": true,
            "value": {
                "min": 0,
                "max": 360
            },
            "animation": {
                "enable": true,
                "speed": 60
            }
            },
            "shape": {
            "type": [
                "circle",
                "square"
            ],
            "options": {}
            },
            "size": {
            "value": {
                "min": 2,
                "max": 4
            }
            },
            "roll": {
            "darken": {
                "enable": true,
                "value": 30
            },
            "enlighten": {
                "enable": true,
                "value": 30
            },
            "enable": true,
            "speed": {
                "min": 15,
                "max": 25
            }
            },
            "wobble": {
            "distance": 30,
            "enable": true,
            "move": true,
            "speed": {
                "min": -15,
                "max": 15
            }
            }
        }
        });
}


function finalizebet(count){
    document.getElementById("placebet_"+count).style.display = 'none'; 
    document.getElementById("finalize_message_"+count).style.display = 'block'; 
    document.getElementById("finalizebet_"+count).style.display = 'block'; 
    
    document.getElementById("amount_"+count).style.color = 'red'; 
    document.getElementById("amount_"+count).style.fontWeight = 'bold'; 
}