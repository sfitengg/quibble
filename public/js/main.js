//Dummy json data

var subjects_json = { 'subjectlist': [
      { id: 0, text: 'Computer Graphics' },
      { id: 1, text: 'Automata Theory' },
      { id: 2, text: 'Programming in C' }
    ]};


var exams_json = { 'examlist': [
      { id: 0, text: 'IAT 1' },
      { id: 1, text: 'IAT 2' },
      { id: 2, text: 'Sem 2' }
    ]};




//when selected a item

var selectItem = function(obj){
  console.log("selectItem() called:")
  console.log(obj)
  obj.siblings().removeClass("active")
  obj.addClass("active")
}

// var selectExams = function(){
//   console.log("selectExams() called")  
//   refreshStudents()
// }

// var selectStudents = function(){
//   console.log("selectStudents() called")  
//   refreshMarks()
// }

// var selectMarks = function(){
//   console.log("selectMarks() called")  
// }



// used to clear the lists

var refreshExams = function(){
  console.log("refreshExams() called")
  refreshStudents();
  $("#two-body").empty()

}

var refreshStudents = function(){
  console.log("refreshStudents() called")
  refreshMarks()
  $("#three-body").empty()
}

var refreshMarks = function(){
  console.log("refreshMarks() called")
  $("#four-body").empty() 
}


//used to load data

var loadSubjects = function(){
  console.log("loadSubjects() called") 
  $.each(subjects_json.subjectlist,function(index,element){
    // alert(element.text);
    $("#one-body").append(" <a href='#!' class='subject-list-item collection-item'>"+element.text+"</a>");
  });
}

var loadExams = function(){
  console.log("loadExams() called") 
  $.each(exams_json.examlist,function(index,element){
    // alert(element.text);
    $("#two-body").append(" <a href='#!' class='exam-list-item collection-item'>"+element.text+"</a>");
  });  
}

var loadStudents = function(){
  console.log("loadStudents() called") 
  $.each(subjects_json.subjectlist,function(index,element){
    // alert(element.text);
    $("#three-body").append(" <a href='#!'  class='student-list-item collection-item'>"+element.text+"</a>");
  });
}

var loadMarks = function(){
  console.log("loadMarks() called") 
  $.each(exams_json.examlist,function(index,element){
    // alert(element.text);
    $("#four-body").append(" <a href='#!' class='mark-list-item collection-item'>"+element.text+"</a>");
  });
}




//on click listeners

  //subjects listener
  $('#one-body').on('click','a.subject-list-item',function(){
    console.log($(this).text()+"  clicked")
    selectItem($(this))
    refreshExams()
    loadExams()
  });

  //exams listener
  $('#two-body').on('click','a.exam-list-item',function(){
    console.log($(this).text()+"  clicked")
    selectItem($(this))
    refreshStudents()
    loadStudents()
  });

  //students listener
  $('#three-body').on('click','a.student-list-item',function(){
    console.log($(this).text()+"  clicked")
    selectItem($(this))
    refreshMarks()
    loadMarks()
  });
