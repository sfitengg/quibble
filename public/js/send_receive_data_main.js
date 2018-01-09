
var data = {'group1':[
{name: 'group1a', value: 'NA'},
{name: 'group1b', value: 'co2'},
{name: 'group1c', value: 'co1'}
],
'group2': [
{name: 'group2b', value: 'co2'},
{name: 'group2a', value: 'co1'}
]
};
var data1 = {'group1':[
{name: '1a', value: '46'},
{name: '1b', value: '12'},
{name: '1c', value: '90'}
]
};

// load data in any form (data is json object of object arrays)
function loadDataInForm(data){
    $.each(data,function(index,object){


        $.each(object, function(name, val){


            console.log(name);
            console.log(val.value);
            var $el = $('[name="'+val.name+'"]')
            console.log('[name="'+val.name+'"]');
            type = $el.attr('type');
            switch(type){
                case 'radio':
                $el.filter('[value="'+val.value+'"]').attr('checked', 'checked');
                break;
                default:
                $el.val(val.value);
            }
        });

    });

}

// get all subjects 
function getSubjects(dept_name,m_year,m_division,m_semester){
    $.get({
        url: "/api/subject/of-class",
        // data: {dept_name: dept_name, semester: semester},
        data:{department:dept_name,year:m_year,division:m_division,semester:m_semester},
        success: function(result){
            console.log(result)
            return result;
        }
    });
}

// get all tests
function getTests(dept_name,semester,subject){
    $.post({
        url: "demo.php",
        data: {'dept_name': dept_name, 'semester': semester, 'subject': subject},
        success: function(result){
            return result
        }
    });
}

function getStudents(dept_name,semester,subject){}

// check if the marks of a student are updated
function getMarks(dept_name,semester,subject,test,student){}

// check if the Course Outcome for a test has been alread updated
function coUpdateCheck(dept_name,semester,subject,test){}

// update a co. We will submit the CO form
function updateCos(dept_name,semester,subject,test){

    $.post({
        url: "demo.php",
        data: $("form#co-form").serializeArray(),
        success: function(result){
            
        }
    });   
}


// update the marks of a student
function updateStudentMarks(dept_name,semester,subject,test,student){

    $.post({
        url: "demo.php",
        data: $("form#").serializeArray(),
        success: function(result){
            
        }
    });
}

function updateStudentMarksWithSheet(dept_name,semester,subject,test){}

// add new subjects
function addSubject(dept_name,semester){}

// add new Tests
function addTests(dept_name,semester,subject){}

