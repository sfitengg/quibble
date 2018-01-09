@extends('layouts.main')

@section('title','| DashBoard')



@section('styles')
  
  
  <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}"  media="screen,projection"/>

  <link type="text/css" rel="stylesheet" href="{{ asset('css/shortcut_css.css') }}"  media="screen,projection"/>
  
  
@endsection


@section('content')

  <head>
    <div class="navbar">

      <nav>
        <div class="nav-wrapper teal">
          <a href="#" data-position="right" class="brand-logo tooltipped logo-text"
          data-delay="700" data-tooltip="Select a subject -> Select the test -> Select the student to update/view marks"> &nbspquibble</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">


            <!-- Dropdown Trigger -->
            
            <li><a href="#!"><i class="material-icons right">account_circle</i> Logout</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">more_vert</i></a></li>

          </ul>
        </div>
      </nav>
    </div>
  </head>


  <main>

    <div class="row no-margin" id="main-section">
      <div class="col s3 section-partition" id="one">
        <div class="app-header-text" id="one-head">Select Fields</div>
        <div>
          <div class="row">
            <div class="row">
              <div class="col s6">
                <select id="year_select">
                  <option value="" disabled selected>Year</option>
                  <option value="FE">FE</option>
                  <option value="SE">SE</option>
                  <option value="TE">TE</option>
                  <option value="BE">BE</option>
                </select>
                <label>Choose Year</label>
              </div>
              <div class="col s6">

               <select id="department_select">
                <option value="" disabled selected>Department</option>
                <option value="IT">IT</option>
                <option value="CMPN">COMPS</option>
                <option value="EXTC">EXTC</option>                        
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col s6">
              <select id="division_select">
                <option value="" disabled selected>Division</option>
                <option value="A">A</option>
                <option value="B">B</option>
              </select>
              <label>Choose Year</label>
            </div>
            <div class="col s6">

             <select id="semester_select">
              <option value="" disabled selected>Semester</option>

            </select>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col s12">
          <a id="load-subject" class=" col s12 waves-effect waves-light btn">Go!</a>
        </div>
      </div>
    </div>
    <div class="app-header-text">
      Select Subjects 
      <a class="white-text modal-trigger" href="#add-subject-modal">
        <i class="material-icons small right margin-right tooltipped" data-position="right" data-tooltip="Add new Subjects">add_circle_outline</i>
      </a>
    </div>
    <div class="collection" id="one-body">

    </div>            

  </div>
  <div class="col s3 section-partition"id="two">
    <div class="app-header-text" id="two-head">
      Select Test
      <a class="white-text modal-trigger" href="#add-test-modal">
        <i class="material-icons small right margin-right tooltipped" data-position="right" data-tooltip="Add new Tests">add_circle_outline</i>
      </a>
    </div>
    <div class="collection" id="two-body">

    </div>


  </div>
  <div class="col s3 section-partition" id="three">
    <div class="app-header-text" id="three-head">Select Student </div>
    <div class="collection" style="overflow: auto;height: 80vh;" id="three-body">

    </div>

  </div>
  <div class="col s3 section-partition" id="four">
    <div class="app-header-text" id="four-head">

      <div class="row no-margin">

        <div class="col s3">

          Marks
        </div>

        <div class="col s9">
          <form action="">
            <div class=" no-margin file-field input-field">
              <span>

                <i  class="right material-icons" data-position="left" data-tooltip="Upload marks of all students using spread sheet">assignment</i>
                <span style="visibility:hidden">.</span>

              </span> 
              <input onchange="this.form.submit()" type="file"/>
              <div  class="file-path-wrapper">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="collection" id="four-body">

      <div class="row">
        <form id="marks-entry-form" style="font-weight: 600;" class="col s12">



          <div class="card">
            <div class="card-content no-padding-bottom no-padding-left no-padding-right">
              Q1.
              <hr/>
              <div class="row text-size-small">

                <div class="col l1 m2">A</div>
                <div class="col l3 m4">
                  <input name="1a" min="0" max="100"  required class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">B</div>
                <div class="col l3 m4">
                  <input name="1b" min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">C</div>
                <div class="col l3 m4">
                  <input name="1c" min="0" max="100" class="input-height-align" type="number"/>
                </div>


                <div class="col l1 m2">D</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">E</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">F</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>

              </div>
            </div>
          </div>  

          <div class="card">
            <div class="card-content no-padding-bottom no-padding-left no-padding-right">
              Q2.
              <hr/>
              <div class="row text-size-small">

                <div class="col l1 m2">A</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">B</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">C</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>


                <div class="col l1 m2">D</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">E</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">F</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>

              </div>
            </div>
          </div>  

          <div class="card">
            <div class="card-content no-padding-bottom no-padding-left no-padding-right">
              Q3.
              <hr/>
              <div class="row text-size-small">

                <div class="col l1 m2">A</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">B</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">C</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>


                <div class="col l1 m2">D</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">E</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>
                <div class="col l1 m2">F</div>
                <div class="col l3 m4">
                  <input min="0" max="100" class="input-height-align" type="number"/>
                </div>

              </div>
            </div>
          </div>
          <input href="#!" type="submit" class="btn light-waves"></input>
        </form>
      </div>

    </div>
  </div>
  

  <!-- modals -->
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <form id="co-form" action="">
      <div class="modal-content no-padding-left no-padding-right">
        <!-- division for Q1 -->
        <div class="row">
          <div class="col s12">
            <div class="card ">
              <div class="card-content">
                <p>
                  <span style="padding:10px;border-radius:21px" class="teal white-text">
                    Q1
                  </span>
                  <a class="teal-text right add-co-btn" href="#!">Add CO <i class="material-icons">arrow_downward</i></a>
                </p>
                <div>
                  <table class="s12">
                    <tr>
                      <th>Question</th>
                      <th>NA</th>
                      <th>CO1</th>
                      <th>CO2</th>
                      <th>CO3</th>
                      <th class="co-4-class">CO4</th>
                      <th class="co-5-class">CO5</th>
                      <th class="co-6-class">CO6</th>
                      <th class="co-7-class">CO7</th>
                      <th class="co-8-class">CO8</th>
                      <th class="co-9-class">CO9</th>
                      <th class="co-10-class">CO10</th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>
                        <p>
                          <input required value="NA" name="group1a" type="radio" id="test1a0" />
                          <label for="test1a0"></label>
                          <!-- here test1a1 - test1, question a, option 1 -->
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group1a" type="radio" id="test1a1" />
                          <label for="test1a1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="c02" name="group1a" type="radio" id="test1a2" />
                          <label for="test1a2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group1a" type="radio" id="test1a3" />
                          <label for="test1a3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group1a" type="radio" id="test1a4" />
                          <label for="test1a4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group1a" type="radio" id="test1a5" />
                          <label for="test1a5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="c06" name="group1a" type="radio" id="test1a6" />
                          <label for="test1a6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group1a" type="radio" id="test1a7" />
                          <label for="test1a7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group1a" type="radio" id="test1a8" />
                          <label for="test1a8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group1a" type="radio" id="test1a9" />
                          <label for="test1a9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group1a" type="radio" id="test1a10" />
                          <label for="test1a10"></label>
                        </p>
                      </td>

                    </tr>
                    <tr>
                      <td>B</td>
                      <td>
                        <p>
                          <input value="NA" required name="group1b" type="radio" id="test1b0" />
                          <label for="test1b0"></label>
                          <!-- 1a1 indicated- Question 1, sub question a, answer 1 -->
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group1b" type="radio" id="test1b1" />
                          <label for="test1b1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group1b" type="radio" id="test1b2" />
                          <label for="test1b2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group1b" type="radio" id="test1b3" />
                          <label for="test1b3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group1b" type="radio" id="test1b4" />
                          <label for="test1b4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group1b" type="radio" id="test1b5" />
                          <label for="test1b5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="co6" name="group1b" type="radio" id="test1b6" />
                          <label for="test1b6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group1b" type="radio" id="test1b7" />
                          <label for="test1b7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group1b" type="radio" id="test1b8" />
                          <label for="test1b8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group1b" type="radio" id="test1b9" />
                          <label for="test1b9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group1b" type="radio" id="test1b10" />
                          <label for="test1b10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>
                        <p>
                          <input value="NA" required name="group1c" type="radio" id="test1c0" />
                          <label for="test1c0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group1c" type="radio" id="test1c1" />
                          <label for="test1c1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group1c" type="radio" id="test1c2" />
                          <label for="test1c2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group1c" type="radio" id="test1c3" />
                          <label for="test1c3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group1c" type="radio" id="test1c4" />
                          <label for="test1c4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group1c" type="radio" id="test1c5" />
                          <label for="test1c5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="co6" name="group1c" type="radio" id="test1c6" />
                          <label for="test1c6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group1c" type="radio" id="test1c7" />
                          <label for="test1c7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group1c" type="radio" id="test1c8" />
                          <label for="test1c8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group1c" type="radio" id="test1c9" />
                          <label for="test1c9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group1c" type="radio" id="test1c10" />
                          <label for="test1c10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>
                        <p>
                          <input value="NA" required name="group1d" type="radio" id="test1d0" />
                          <label for="test1d0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group1d" type="radio" id="test1d1" />
                          <label for="test1d1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group1d" type="radio" id="test1d2" />
                          <label for="test1d2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group1d" type="radio" id="test1d3" />
                          <label for="test1d3"></label>
                        </p>
                      </td>
                      <td class=="co-4-class">
                        <p>
                          <input value="co4" name="group1d" type="radio" id="test1d4" />
                          <label for="test1d4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group1d" type="radio" id="test1d5" />
                          <label for="test1d5"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co6" name="group1d" type="radio" id="test1d6" />
                          <label for="test1d6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group1d" type="radio" id="test1d7" />
                          <label for="test1d7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group1d" type="radio" id="test1d8" />
                          <label for="test1d8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group1d" type="radio" id="test1d9" />
                          <label for="test1d9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group1d" type="radio" id="test1d10" />
                          <label for="test1d10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>
                        <p>
                          <input value="NA" required name="group1e" type="radio" id="test1e0" />
                          <label for="test1e0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group1e" type="radio" id="test1e1" />
                          <label for="test1e1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group1e" type="radio" id="test1e2" />
                          <label for="test1e2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group1e" type="radio" id="test1e3" />
                          <label for="test1e3"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co4" name="group1e" type="radio" id="test1e4" />
                          <label for="test1e4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group1e" type="radio" id="test1e5" />
                          <label for="test1e5"></label>
                        </p>
                      </td>

                      <td>
                        <p>
                          <input value="co6" name="group1e" type="radio" id="test1e6" />
                          <label for="test1e6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group1e" type="radio" id="test1e7" />
                          <label for="test1e7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group1e" type="radio" id="test1e8" />
                          <label for="test1e8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group1e" type="radio" id="test1e9" />
                          <label for="test1e9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group1e" type="radio" id="test1e10" />
                          <label for="test1e10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr id="tr-group1f-id">
                      <td>F</td>
                      <td>
                        <p>
                          <input value="NA" required name="group1f" type="radio" id="test1f0" />
                          <label for="test1f0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group1f" type="radio" id="test1f1" />
                          <label for="test1f1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group1f" type="radio" id="test1f2" />
                          <label for="test1f2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group1f" type="radio" id="test1f3" />
                          <label for="test1f3"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co4" name="group1f" type="radio" id="test1f4" />
                          <label for="test1f4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group1f" type="radio" id="test1f5" />
                          <label for="test1f5"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co6" name="group1f" type="radio" id="test1f6" />
                          <label for="test1f6"></label>
                        </p>
                      </td>

                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group1f" type="radio" id="test1f7" />
                          <label for="test1f7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group1f" type="radio" id="test1f8" />
                          <label for="test1f8"></label>
                        </p>
                      </td>

                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group1f" type="radio" id="test1f9" />
                          <label for="test1f9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group1f" type="radio" id="test1f10" />
                          <label for="test1f10"></label>
                        </p>
                      </td>                   
                    </tr>          
                  </table>
                </div>
              </div>
              <div class="card-action">
                <a class="teal-text" id="add-question-group1" href="#">Add a sub question</a>

              </div>
            </div>
          </div>
        </div>
        <!-- division for Q2 -->
        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content ">
                <p>
                  <span style="padding:10px;border-radius:21px" class="teal white-text">
                    Q2
                  </span>
                  <a class="teal-text right add-co-btn">Add CO <i class="material-icons">arrow_downward</i></a>
                </p>
                <div>
                  <table>
                    <tr>
                      <th>Question</th>
                      <th>NA</th>
                      <th>CO1</th>
                      <th>CO2</th>
                      <th>CO3</th>
                      <th class="co-4-class">CO4</th>
                      <th class="co-5-class">CO5</th>
                      <th class="co-6-class">CO6</th>
                      <th class="co-7-class">CO7</th>
                      <th class="co-8-class">CO8</th>
                      <th class="co-9-class">CO9</th>
                      <th class="co-10-class">CO10</th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>
                        <p>
                          <input value="NA" required name="group2a" type="radio" id="test2a0" />
                          <label for="test2a0"></label>
                          <!-- here test1a1 - test1, question a, option 1 -->
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group2a" type="radio" id="test2a1" />
                          <label for="test2a1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group2a" type="radio" id="test2a2" />
                          <label for="test2a2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group2a" type="radio" id="test2a3" />
                          <label for="test2a3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group2a" type="radio" id="test2a4" />
                          <label for="test2a4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group2a" type="radio" id="test2a5" />
                          <label for="test2a5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="co6" name="group2a" type="radio" id="test2a6" />
                          <label for="test2a6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group2a" type="radio" id="test2a7" />
                          <label for="test2a7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group2a" type="radio" id="test2a8" />
                          <label for="test2a8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group2a" type="radio" id="test2a9" />
                          <label for="test2a9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group2a" type="radio" id="test2a10" />
                          <label for="test2a10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>
                        <p>
                          <input value="NA" required name="group2b" type="radio" id="test2b0" />
                          <label for="test2b0"></label>
                          <!-- 1a1 indicated- Question 1, sub question a, answer 1 -->
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group2b" type="radio" id="test2b1" />
                          <label for="test2b1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group2b" type="radio" id="test2b2" />
                          <label for="test2b2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group2b" type="radio" id="test2b3" />
                          <label for="test2b3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group2b" type="radio" id="test2b4" />
                          <label for="test2b4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group2b" type="radio" id="test2b5" />
                          <label for="test2b5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="co6" name="group2b" type="radio" id="test2b6" />
                          <label for="test2b6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group2b" type="radio" id="test2b7" />
                          <label for="test2b7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group2b" type="radio" id="test2b8" />
                          <label for="test2b8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group2b" type="radio" id="test2b9" />
                          <label for="test2b9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group2b" type="radio" id="test2b10" />
                          <label for="test2b10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>
                        <p>
                          <input value="NA" required name="group2c" type="radio" id="test2c0" />
                          <label for="test2c0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group2c" type="radio" id="test2c1" />
                          <label for="test2c1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group2c" type="radio" id="test2c2" />
                          <label for="test2c2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group2c" type="radio" id="test2c3" />
                          <label for="test2c3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group2c" type="radio" id="test2c4" />
                          <label for="test2c4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group2c" type="radio" id="test2c5" />
                          <label for="test2c5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="co6" name="group2c" type="radio" id="test2c6" />
                          <label for="test2c6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group2c" type="radio" id="test2c7" />
                          <label for="test2c7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group2c" type="radio" id="test2c8" />
                          <label for="test2c8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group2c" type="radio" id="test2c9" />
                          <label for="test2c9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group2c" type="radio" id="test2c10" />
                          <label for="test2c10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr id="tr-group2d-id">
                      <td>D</td>
                      <td>
                        <p>
                          <input value="NA" required name="group2d" type="radio" id="test2d0" />
                          <label for="test2d0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group2d" type="radio" id="test2d1" />
                          <label for="test2d1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group2d" type="radio" id="test2d2" />
                          <label for="test2d2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group2d" type="radio" id="test2d3" />
                          <label for="test2d3"></label>
                        </p>
                      </td>
                      <td class=="co-4-class">
                        <p>
                          <input value="co4" name="group2d" type="radio" id="test2d4" />
                          <label for="test2d4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group2d" type="radio" id="test2d5" />
                          <label for="test2d5"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co6" name="group2d" type="radio" id="test2d6" />
                          <label for="test2d6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group2d" type="radio" id="test2d7" />
                          <label for="test2d7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group2d" type="radio" id="test2d8" />
                          <label for="test2d8"></label>
                        </p>
                      </td>
                      <td class="co-9-class9">
                        <p>
                          <input value="co" name="group2d" type="radio" id="test2d9" />
                          <label for="test2d9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group2d" type="radio" id="test2d10" />
                          <label for="test2d10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr id="tr-group2e-id">
                      <td>E</td>
                      <td>
                        <p>
                          <input value="NA" required name="group2e" type="radio" id="test2e0" />
                          <label for="test2e0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group2e" type="radio" id="test2e1" />
                          <label for="test2e1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group2e" type="radio" id="test2e2" />
                          <label for="test2e2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group2e" type="radio" id="test2e3" />
                          <label for="test2e3"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co4" name="group2e" type="radio" id="test2e4" />
                          <label for="test2e4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group2e" type="radio" id="test2e5" />
                          <label for="test2e5"></label>
                        </p>
                      </td>

                      <td>
                        <p>
                          <input value="co6" name="group2e" type="radio" id="test2e6" />
                          <label for="test2e6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group2e" type="radio" id="test2e7" />
                          <label for="test2e7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group2e" type="radio" id="test2e8" />
                          <label for="test2e8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group2e" type="radio" id="test2e9" />
                          <label for="test2e9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group2e" type="radio" id="test2e10" />
                          <label for="test2e10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr id="tr-group2f-id">
                      <td>F</td>
                      <td>
                        <p>
                          <input value="NA" required name="group2f" type="radio" id="test2f0" />
                          <label for="test2f0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group2f" type="radio" id="test2f1" />
                          <label for="test2f1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group2f" type="radio" id="test2f2" />
                          <label for="test2f2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group2f" type="radio" id="test2f3" />
                          <label for="test2f3"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co4" name="group2f" type="radio" id="test2f4" />
                          <label for="test2f4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group2f" type="radio" id="test2f5" />
                          <label for="test2f5"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co6" name="group2f" type="radio" id="test2f6" />
                          <label for="test2f6"></label>
                        </p>
                      </td>

                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group2f" type="radio" id="test2f7" />
                          <label for="test2f7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group2f" type="radio" id="test2f8" />
                          <label for="test2f8"></label>
                        </p>
                      </td>

                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group2f" type="radio" id="test2f9" />
                          <label for="test2f9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group2f" type="radio" id="test2f10" />
                          <label for="test2f10"></label>
                        </p>
                      </td>                   
                    </tr>


                  </table>
                </div>
              </div>
              <div class="card-action">
                <a class="teal-text" id="add-question-group2" href="#">Add a sub question</a>

              </div>
            </div>
          </div>
        </div>
        <!-- division for Q3 -->
        <div class="row">
          <div class="col s12">
            <div class="card ">
              <div class="card-content ">
                <p>
                  <span style="padding:10px;border-radius:21px" class="teal white-text">
                    Q3
                  </span>
                  <a class="teal-text right add-co-btn">Add CO <i class="material-icons">arrow_downward</i></a>
                </p>
                <div>
                  <table>
                    <tr>
                      <th>Question</th>
                      <th>NA</th>
                      <th>CO1</th>
                      <th>CO2</th>
                      <th>CO3</th>
                      <th class="co-4-class">CO4</th>
                      <th class="co-5-class">CO5</th>
                      <th class="co-6-class">CO6</th>
                      <th class="co-7-class">CO7</th>
                      <th class="co-8-class">CO8</th>
                      <th class="co-9-class">CO9</th>
                      <th class="co-10-class">CO10</th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>
                        <p>
                          <input value="NA" required name="group3a" type="radio" id="test3a0" />
                          <label for="test3a0"></label>
                          <!-- here test1a1 - test1, question a, option 1 -->
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group3a" type="radio" id="test3a1" />
                          <label for="test3a1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group3a" type="radio" id="test3a2" />
                          <label for="test3a2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group3a" type="radio" id="test3a3" />
                          <label for="test3a3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group3a" type="radio" id="test3a4" />
                          <label for="test3a4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group3a" type="radio" id="test3a5" />
                          <label for="test3a5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="co6" name="group3a" type="radio" id="test3a6" />
                          <label for="test3a6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group3a" type="radio" id="test3a7" />
                          <label for="test3a7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group3a" type="radio" id="test3a8" />
                          <label for="test3a8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group3a" type="radio" id="test3a9" />
                          <label for="test3a9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group3a" type="radio" id="test3a10" />
                          <label for="test3a10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>
                        <p>
                          <input value="NA" required name="group3b" type="radio" id="test3b0" />
                          <label for="test3b0"></label>
                          <!-- 1a1 indicated- Question 1, sub question a, answer 1 -->
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group3b" type="radio" id="test3b1" />
                          <label for="test3b1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group3b" type="radio" id="test3b2" />
                          <label for="test3b2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group3b" type="radio" id="test3b3" />
                          <label for="test3b3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group3b" type="radio" id="test3b4" />
                          <label for="test3b4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group3b" type="radio" id="test3b5" />
                          <label for="test3b5"></label>
                        </p>
                      </td>
                      <td class="co-6-class">
                        <p>
                          <input value="co6" name="group3b" type="radio" id="test3b6" />
                          <label for="test3b6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group3b" type="radio" id="test3b7" />
                          <label for="test3b7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group3b" type="radio" id="test3b8" />
                          <label for="test3b8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group3b" type="radio" id="test3b9" />
                          <label for="test3b9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group3b" type="radio" id="test3b10" />
                          <label for="test3b10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>
                        <p>
                          <input value="NA" required name="group2c" type="radio" id="test3c0" />
                          <label for="test3c0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group3c" type="radio" id="test3c1" />
                          <label for="test3c1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group3c" type="radio" id="test3c2" />
                          <label for="test3c2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group3c" type="radio" id="test3c3" />
                          <label for="test3c3"></label>
                        </p>
                      </td>
                      <td class="co-4-class">
                        <p>
                          <input value="co4" name="group3c" type="radio" id="test3c4" />
                          <label for="test3c4"></label>
                        </p>
                      </td>
                      <td class="co-5-class">
                        <p>
                          <input value="co5" name="group3c" type="radio" id="test3c5" />
                          <label for="test3c5"></label>
                        </p>
                      </td>
                      <td class="co-6-class6">
                        <p>
                          <input value="co" name="group3c" type="radio" id="test3c6" />
                          <label for="test3c6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group3c" type="radio" id="test3c7" />
                          <label for="test3c7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group3c" type="radio" id="test3c8" />
                          <label for="test3c8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group3c" type="radio" id="test3c9" />
                          <label for="test3c9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group3c" type="radio" id="test3c10" />
                          <label for="test3c10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr id="tr-group3d-id">
                      <td>D</td>
                      <td>
                        <p>
                          <input value="NA" required name="group3d" type="radio" id="test3d0" />
                          <label for="test3d0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group3d" type="radio" id="test3d1" />
                          <label for="test3d1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group3d" type="radio" id="test3d2" />
                          <label for="test3d2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group3d" type="radio" id="test3d3" />
                          <label for="test3d3"></label>
                        </p>
                      </td>
                      <td class=="co-4-class">
                        <p>
                          <input value="co4" name="group3d" type="radio" id="test3d4" />
                          <label for="test3d4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group3d" type="radio" id="test3d5" />
                          <label for="test3d5"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co6" name="group3d" type="radio" id="test3d6" />
                          <label for="test3d6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group3d" type="radio" id="test3d7" />
                          <label for="test3d7"></label>
                        </p>
                      </td>
                      <td class="co-8-class8">
                        <p>
                          <input value="co" name="group3d" type="radio" id="test3d8" />
                          <label for="test3d8"></label>
                        </p>
                      </td>
                      <td class="co-9-class9">
                        <p>
                          <input value="co" name="group3d" type="radio" id="test3d9" />
                          <label for="test3d9"></label>
                        </p>
                      </td>
                      <td class="co-10-class10">
                        <p>
                          <input value="co" name="group3d" type="radio" id="test3d10" />
                          <label for="test3d10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr id="tr-group3e-id"> 
                      <td>E</td>
                      <td>
                        <p>
                          <input value="NA" required name="group3e" type="radio" id="test3e0" />
                          <label for="test3e0"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group3e" type="radio" id="test3e1" />
                          <label for="test3e1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group3e" type="radio" id="test3e2" />
                          <label for="test3e2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group3e" type="radio" id="test3e3" />
                          <label for="test3e3"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co4" name="group3e" type="radio" id="test3e4" />
                          <label for="test3e4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group3e" type="radio" id="test3e5" />
                          <label for="test3e5"></label>
                        </p>
                      </td>

                      <td>
                        <p>
                          <input value="co6" name="group3e" type="radio" id="test3e6" />
                          <label for="test3e6"></label>
                        </p>
                      </td>
                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group3e" type="radio" id="test3e7" />
                          <label for="test3e7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group3e" type="radio" id="test3e8" />
                          <label for="test3e8"></label>
                        </p>
                      </td>
                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group3e" type="radio" id="test3e9" />
                          <label for="test3e9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="co10" name="group3e" type="radio" id="test3e10" />
                          <label for="test3e10"></label>
                        </p>
                      </td>
                    </tr>
                    <tr id="tr-group3f-id">
                      <td>F</td>
                      <td>
                        <p>
                          <input value="NA" required name="group3f" type="radio" id="test3f0" />
                          <label for="test3f0"> </label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co1" name="group3f" type="radio" id="test3f1" />
                          <label for="test3f1"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co2" name="group3f" type="radio" id="test3f2" />
                          <label for="test3f2"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co3" name="group3f" type="radio" id="test3f3" />
                          <label for="test3f3"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co4" name="group3f" type="radio" id="test3f4" />
                          <label for="test3f4"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co5" name="group3f" type="radio" id="test3f5" />
                          <label for="test3f5"></label>
                        </p>
                      </td>
                      <td>
                        <p>
                          <input value="co6" name="group3f" type="radio" id="test3f6" />
                          <label for="test3f6"></label>
                        </p>
                      </td>

                      <td class="co-7-class">
                        <p>
                          <input value="co7" name="group3f" type="radio" id="test3f7" />
                          <label for="test3f7"></label>
                        </p>
                      </td>
                      <td class="co-8-class">
                        <p>
                          <input value="co8" name="group3f" type="radio" id="test3f8" />
                          <label for="test3f8"></label>
                        </p>
                      </td>

                      <td class="co-9-class">
                        <p>
                          <input value="co9" name="group3f" type="radio" id="test3f9" />
                          <label for="test3f9"></label>
                        </p>
                      </td>
                      <td class="co-10-class">
                        <p>
                          <input value="CO10" name="group3f" type="radio" id="test3f10" />
                          <label for="test3f10"></label>
                        </p>
                      </td>                   
                    </tr>


                  </table>
                </div>
              </div>
              <div class="card-action">
                <a class="teal-text" id="add-question-group3" href="#">Add a sub question</a>

              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <input id="submit-co" href="#!" class="modal-action waves-effect waves-green btn-flat" type="submit"/>
      </div>
    </form>
  </div>

  <!-- bottom  modal to add subject -->

  <div id="add-subject-modal" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Add a subject?</h4>
      <div class="row">

        <form>
          <div class="col s12">
            <input placeholder="Subject Name" class="text"/>
          </div>
        </form>

      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Add</a>
    </div>
  </div>


  <!-- bottom  modal to add  test -->

  <div id="add-test-modal" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Add a test?</h4>
      <div class="row">

        <form>
          <div class="col s12">
            <input placeholder="Test Name" class="text"/>
          </div>
        </form>

      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Add</a>
    </div>
  </div>


  <!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">Delete Subject</a></li>
    <li><a href="#!">Delete Test</a></li>
    <li class="divider"></li>
    <li><a href="#!">More</a></li>
  </ul>


</main>
<footer style="height: 30px;" class="teal">

</footer>

@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('js/drop_menu_inmain.js')}}"></script>  
<script type="text/javascript" src="{{asset('js/send_receive_data_main.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $('select').material_select();
  $(".modal").modal(); //modal initialization
  $(".dropdown-button").dropdown();
  hideElementsOnStart();
});
</script>
@endsection
