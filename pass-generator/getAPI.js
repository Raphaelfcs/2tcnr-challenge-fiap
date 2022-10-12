$("button").click(function(){
    $.get("http://ec2-44-204-193-8.compute-1.amazonaws.com:3000/getNumber", function(data, status){
      console.log(data)
    });
  });