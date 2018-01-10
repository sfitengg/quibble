//Dummy json data

co_visiblity_count = 6;
question2_visiblity_count = 3;
question3_visiblity_count = 3;
GLOBAL_SELECTED_SUBJECT = "";
GLOBAL_SELECTED_SUBJECT_ID = "";
GLOBAL_SELECTED_TEST = "";
var subjects_json = { 'subjectlist': [
{ id: 0, text: 'Computer Graphics' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 1, text: 'Automata Theory' },
{ id: 2, text: 'Programming in C' }
]};


var exams_json = { 'examlist': [
{ id: 0, text: 'IAT 1' },
{ id: 1, text: 'IAT 2' },
{ id: 2, text: 'IAT 3' }
]};



//hide rows and cols of table (CO mapping)
function hideElementsOnStart(){
  $(".co-7-class").hide();
  $(".co-8-class").hide();
  $(".co-9-class").hide();
  $(".co-10-class").hide();
  $("#tr-group1f-id").hide(); //6 question in Q1
  $("#tr-group2d-id").hide(); //3 question in Q2
  $("#tr-group2e-id").hide();
  $("#tr-group2f-id").hide();
  $("#tr-group3d-id").hide(); //3 question in Q3
  $("#tr-group3e-id").hide();
  $("#tr-group3f-id").hide();

}

//show next CO
$(".add-co-btn").click(function (){
  add_co();
}); 
function add_co(){
  while(co_visiblity_count<11){
    co_visiblity_count++;
    if($(".co-"+co_visiblity_count+"-class").is(":visible")){
      continue;
    }
    else{
      $(".co-"+co_visiblity_count+"-class").show();
      break;
    }
  }
  $(".co-7-class").show();
}

function map(i){
  // this conversion is to convert number to appropriate letter, so the 
  // name of row(sub question) which is to be shown can be formed.

  switch(i){
    case 4:
    return "d"
    break
    case 5:
    return "e"
    break
    case 6:
    return "f"
  }
}


//add question to Q1
$("#add-question-group1").click(function(){
  $("#tr-group1f-id").show();  
});
//add questions to Q2
$("#add-question-group2").click(function(){

  while(question2_visiblity_count<7){
    question2_visiblity_count++;
    // if($("#tr-group2"+map(question2_visiblity_count)+"-id").is(":visible")){
    //   continue;
    // }
    // else{
      $("#tr-group2"+map(question2_visiblity_count)+"-id").show();
      console.log("i am ececuted");
      break;
    // }
  }
});
//add question to Q3
$("#add-question-group3").click(function(){
  while(question3_visiblity_count<7){
    question3_visiblity_count++;
    if($("#tr-group3"+map(question3_visiblity_count)+"-id").is(":visible")){
      continue;
    }
    else{
      $("#tr-group3"+map(question3_visiblity_count)+"-id").show();
      console.log("i am ececuted");
      break;
    }
  }
});

$("#load-subject").click(function(){
  console.log($("#year_select").val())
  if($("#year_select").val()!=null){
    if($("#department_select").val()!=null){
      if($("#division_select").val()!=null){

        loadSubjects();
      }
      else{
        Materialize.toast('Please select a division', 4000)
      }
    }
    else{
      Materialize.toast('Please select a department', 4000)
    }
  }
  else{
    Materialize.toast('Please select a year first', 4000)
  }
});
//when selected a item

var selectItem = function(obj){
  console.log("selectItem() called:")
  // console.log(obj)
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
  $("#four-body").css('visibility', 'hidden');
}

//used to load data

var loadSubjects = function(){
  console.log("loadSubjects() called") 
  //get the subjects from database
  // subjects_json = getSubjects($("department_select").val(),$("year_select").val(),$("division_select").val(),$("semester_select").val())
  
  $.ajax({
    url: "/api/department/"+$("#department_select").val()+"/subjects/sem/"+$("#semester_select").val(),
    type: "get",
    // data:{department:,year:$("#year_select").val(),division:$("#division_select").val(),semester:$("#semester_select").val()},
    success: function(result){
      console.log(result)
        //remove earlier subject list
      $("#one-body").empty()

      //fill new list
      $.each(result.subjects,function(index,element){
        // alert(element.name);
        $("#one-body").append(" <a href='#!' data-id='"+element.id+"' class='subject-list-item collection-item'>"+element.name+"</a>");
      });            
    }
  });
 

}

var loadExams = function(){ //subject
  console.log("loadExams() called") 
  
  // get tests from DB
  // exams_json = getTests($("department_select").val(),$("semester_select").val(),subject);

  $.get({
      url: "/api/subject/"+GLOBAL_SELECTED_SUBJECT_ID+"/exams",
      // data: {'dept_name': dept_name, 'semester': semester, 'subject': subject},
      success: function(result){
        console.log(result);
        $.each(result.exams,function(index,element){
          // alert(element.text);
          $("#two-body").append(" <a href='#!' data-id='"+element.id+"'' class='exam-list-item collection-item'>"+element.name+"<span class='badge setting-exam'><i class='tiny setting-exam material-icons'>build</i></span></a>");
          // setting-exam class will be used to trigger modal for setting up exam details
        });  
      }
  });
  
}

var loadStudents = function(){  
  console.log("loadStudents() called") 

  // get Students from DB
  // student_json = getStudents($("department_select").val(),$("semester_select").val(),GLOBAL_SELECTED_SUBJECT);


  $.get({
        url: "/api/classroom/"+$("#year_select").val()+"-"+$("#department_select").val()+"-"+$("#division_select").val()+"/students",
        // data: {'dept_name': dept_name, 'semester': semester, 'subject': subject},
        success: function(result){
            
            $.each(result.students,function(index,element){
              // alert(element.text);
              $("#three-body").append(" <a href='#!'  class='student-list-item collection-item'>"+element.name+"</a>");
            });
        }
    });
  
}

var loadMarks = function(){  //student

  // var marks_json = getMarks($("department_select").val(),$("semester_select").val(),GLOBAL_SELECTED_SUBJECT,GLOBAL_SELECTED_TEST,student);
  console.log("loadMarks() called")
  $("#four-body").css('visibility', 'visible');
    // document.getElementById("marks-entry-form").reset();

  // if(student_json != false ){
  //   // if marks have been already set, load them from database
  //   loadDataInForm(student_json);
  // }  


}


//on click listeners

  //subjects listener
  $('#one-body').on('click','a.subject-list-item',function(){
    console.log($(this).text()+"  clicked")
    selectItem($(this))
    refreshExams()
    GLOBAL_SELECTED_SUBJECT = $(this).text();
    GLOBAL_SELECTED_SUBJECT_ID = $(this).attr('data-id');
    loadExams($(this).text())
  });

  $('#one-body').on('dblclick','a.subject-list-item',function(){
    console.log($(this).text()+"  double clicked")
    
  });


  //exams listener
  $('#two-body').on('click','a.exam-list-item',function(e){
    //check if settings of exam is clicked
    if($(e.target).hasClass("setting-exam")){


      // //check if the co has already been set or not
      console.log($(e.target).parent().parent().attr('data-id'))
      // $.get({
      //   url: "",
      //   data: {},
      //   success: function(result){

      //   }
      // )};
      // var data = coUpdateCheck($("#department_select").val(),$("#semester_select").val(),GLOBAL_SELECTED_SUBJECT,GLOBAL_SELECTED_TEST);
      $("#modal1").modal("open")
      // document.getElementById("co-form").reset();
      console.log("Setting Exam: "+$(e.target).parent().parent().text()) 
      // if(data != false){
      //   //if the CO is updated in DB, then load it from DB
      //   loadDataInForm(data)
      // }
    }
    // // if setting icon is not clicked, proceed with loading tests
    else{ 
      console.log($(this).text()+"  clicked")
      selectItem($(this))
      refreshStudents()
      GLOBAL_SELECTED_TEST = $(this).text();
      //no need to pass test, as the set of students in a subject will be same in any test
      loadStudents()
    }
  });

  //students listener
  $('#three-body').on('click','a.student-list-item',function(){
    console.log($(this).text()+"  clicked")
    selectItem($(this))
    refreshMarks()
    loadMarks($(this).text())
  });

  $("#logout-button").click(function(){
    loadDataInForm(data)
    // $.get({
    //   url: "account/logout",
    //   success: function(result){
    //     window.location.href="";
    //   }
    // });
  }); 

// submit co form
// $("#submit-co").on("click",function(){
//     updateCos($("#department_select").val(),$("#semester_select").val(),GLOBAL_SELECTED_SUBJECT,GLOBAL_SELECTED_TEST);
// });