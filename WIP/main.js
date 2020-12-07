var ratedIndex = -1;

function resetColors() {
    $(".rps i").css("color", "#e2e2e2");
}

function setStars(max){
    for(var i = 0; i <= max; i++) {
        $(".rps i:eq(" + i + ")").css("color", "#f7bf17"); 
    }
}
$(document).ready(function(){
    
    
    
    $(".rpc i, .review-bg").click(function(){
        $(".review-modal").fadeOut();
    })
    $(".opmd").click(function(){
        $(".review-modal").fadeIn();
    })
    
    
    
    resetColors();
    
    $(".rps i").mouseover(function(){
        resetColors();
        var currentIndex = parseInt($(this).data("Index"));
        setStars(currentIndex);
    })
    
    $(".rps i").on("click", function(){
        ratedIndex = parseInt($(this).data("index"));
        localStorage.setItem("rating",ratedIndex);
        $(".startRateV").val(parseInt(localStorage.getItem("rating")));
    })
    
    $(".rps i").mouseleave(function(){
        resetColors();
        if (ratedIndex ! = -1){
            setStars(ratedIndex);
        }
    })
    
    if(localStorage.getItem("rating") !=null){
        setStars(parseInt(localStorage.getItem("rating")));
        $(".setRateV").val(parseInt(localStorage.getItem("rating")));
    }
    
    
    
    $(".rpbtn").click(function(){
        if($("rate-field").val() == ""){
            $(".rate-error").html("Please Fill In Text Box...");
        }
        else if($(".raterName").val() == ""){
            $(".rate-error").html("Please Enter Your Name!");
        }
        else if(localStorage.getItem("rating")==null){
            $(".rate-error").html("Please Enter Star Rating");
        }
        else{
            $(".rate-error").html("");
            
            var $form = $(this).closest(".rmp");
            var starRate = $form.find(".starRate").val();
            var rateMsg = $form.find(".rateMsg").val();
            var date = $form.find(".date").val();
            var name = $form.find(".name").val();
            
            $.ajax({
                url: "rate.php",
                type: "POST",
                dat: {
                    starRate: starRate,
                    ratemsg: rateMsg,
                    date: date,
                    name: name
                },
                success: function(data){
                    window.location.reload();
                }
            })
        }
           
    })
    
})