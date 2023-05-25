<script>
    
$(document).ready(function(){
  var schoolyearay = '';
  $('#select').change(function() {
    load_data();
  });
  $('#selectsem').change(function() {
  var valueToWord = {
    '1': 'First Semester',
    '2': 'Second Semester',
    'all': 'First and Second Semester'
  };

  var selectedValue = $(this).val();
  var ay = ' (A.Y. ' + schoolyearay + ').';
  var selectedWord = valueToWord[selectedValue];
  $('#label').text(selectedWord + ay);
  
  load_data();
});

  function load_data() {
  var selectedYear = $('#select').val();
  var selectedSem = $('#selectsem').val();
  $.ajax({
    url: "<?php echo base_url(); ?>Records/load_data",
    dataType: "JSON",
    data: { id: <?=$id?>, year: selectedYear, sem: selectedSem },
    success: function(data) {
      var html = '';
      var isFirstSemester = true;
      var isSecondSemesterShown = false;
      var ay = '';
      if (data == null || data == '') {
        html += '<tr><td colspan="5" style="border-left: 1px solid black;border-right: 1px solid black;text-align: center; margin-right:100px;"><strong><u>No Subject/s</u></strong></td></tr>';
      } else {
        if (selectedSem == "2") {
          html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>Second Sem '+ schoolyearay +'</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
          isSecondSemesterShown = true; // Set the flag to true after showing the second semester label row
        }

        let firstSemesterSum = 0;
        let firstSemesterCount = 0;
        let secondSemesterSum = 0;
        let secondSemesterCount = 0;

        $.each(data, function(key, value) {
          schoolyearay = value.school_year;
          schoolyearay = schoolyearay;
          var gradesvalue = value.grade;
          // const numericValue = Number(gradesvalue);
          // const grade = numericValue.toFixed(2).replace(/\.00$/, "");
          let grade  = '';
          if (gradesvalue >= 98 && gradesvalue <= 100) {
            grade = '1.0';
          } else if (gradesvalue >= 95 && gradesvalue <= 97) {
            grade = '1.25';
          } else if (gradesvalue >= 92 && gradesvalue <= 94) {
            grade = '1.5';
          } else if (gradesvalue >= 89 && gradesvalue <= 91) {
            grade = '1.75';
          } else if (gradesvalue >= 86 && gradesvalue <= 88) {
            grade = '2.0';
          } else if (gradesvalue >= 83 && gradesvalue <= 85) {
            grade = '2.25';
          } else if (gradesvalue >= 80 && gradesvalue <= 82) {
            grade = '2.5';
          } else if (gradesvalue >= 77 && gradesvalue <= 79) {
            grade = '2.75';
          } else if (gradesvalue >= 75 && gradesvalue <= 76) {
            grade = '3.0';
          } else if (gradesvalue < 75 && gradesvalue >= 1) {
            grade = '5';
          } else if (gradesvalue === '' || gradesvalue == 0.00 || gradesvalue == null) {
            grade = gradesvalue;
          }

          if ((selectedSem == "1" && value.semester == 1) || (selectedSem == "2" && value.semester == 2) || selectedSem == "all") {
            if (value.semester == 1 && isFirstSemester) {
              html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"><strong><u>First Sem '+ value.school_year +'</u></strong></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              isFirstSemester = false;
            }
            if (value.semester == 2 && !isFirstSemester && !isSecondSemesterShown) {
              html += '<tr class="spaceUnder"><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><strong><u>Second Sem '+ value.school_year +'</u></strong></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"></td></tr>';
              isFirstSemester = true;
              isSecondSemesterShown = true;
              ay = value.school_year;
            }
             // Calculate general average for each semester
            if (value.semester == 1) {
              firstSemesterSum += parseFloat(value.grade);
              firstSemesterCount++;
            } else if (value.semester == 2) {
              secondSemesterSum += parseFloat(value.grade);
              secondSemesterCount++;
            }
            
            html += '<tr class="spaceUnder">';
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="coursecode" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.coursecode + '</td>';
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="description" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.description + '</td>';
            if (value.grade == '' || value.grade == 0.00 || value.grade == 'NULL') {
              html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="units" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">0</td>';
            } else {
              html  += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="units" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + value.units + '</td>'; 
            }
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="pre_req" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">' + grade +'</td>';
            if (value.grade >= 75) {
            html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="grade" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">PASSED</td>';
            } else {
              html += '<td class="table_data" data-row_id="' + value.sl_id + '" data-column_name="grade" style="border-left: 1px solid black;border-right: 1px solid black;border-top-style: hidden;">FAILED</td>';
            }
            html += '</tr>';
          }
        });
        const allcount = firstSemesterCount + secondSemesterCount;
        const allgrades = firstSemesterSum + secondSemesterSum;
        const allga = allgrades / allcount;
        const formatted_value_all = allga.toFixed(2).replace(/\.00$/, "");
        const firstSemesterAverage = firstSemesterSum / firstSemesterCount;
        const secondSemesterAverage = secondSemesterSum / secondSemesterCount;
        const formatted_value_first = firstSemesterAverage.toFixed(2).replace(/\.00$/, "");
        const formatted_value_second = secondSemesterAverage.toFixed(2).replace(/\.00$/, "");
        let formatted_value_second_output = ''; // Declare as a regular variable instead of constant
        let formatted_value_first_output = ''; 
        let formatted_value_all_output = ''; 
          if (allga >= 98 && allga <= 100) {
            formatted_value_all_output = '1.0';
          } else if (allga >= 95 && allga <= 97) {
            formatted_value_all_output = '1.25';
          } else if (allga >= 92 && allga <= 94) {
            formatted_value_all_output = '1.5';
          } else if (allga >= 89 && allga <= 91) {
            formatted_value_all_output = '1.75';
          } else if (allga >= 86 && allga <= 88) {
            formatted_value_all_output = '2.0';
          } else if (allga >= 83 && allga <= 85) {
            formatted_value_all_output = '2.25';
          } else if (allga >= 80 && allga <= 82) {
            formatted_value_all_output = '2.5';
          } else if (allga >= 77 && allga <= 79) {
            formatted_value_all_output = '2.75';
          } else if (allga >= 75 && allga <= 76) {
            formatted_value_all_output = '3.0';
          } else if (allga < 75 && allga >= 1) {
            formatted_value_all_output = '5';
          } else if (allga === '' || allga == 0.00 || allga == null) {
            formatted_value_all_output = allga;
          }
          if (formatted_value_second >= 98 && formatted_value_second <= 100) {
            formatted_value_second_output = '1.0';
          } else if (formatted_value_second >= 95 && formatted_value_second <= 97) {
            formatted_value_second_output = '1.25';
          } else if (formatted_value_second >= 92 && formatted_value_second <= 94) {
            formatted_value_second_output = '1.5';
          } else if (formatted_value_second >= 89 && formatted_value_second <= 91) {
            formatted_value_second_output = '1.75';
          } else if (formatted_value_second >= 86 && formatted_value_second <= 88) {
            formatted_value_second_output = '2.0';
          } else if (formatted_value_second >= 83 && formatted_value_second <= 85) {
            formatted_value_second_output = '2.25';
          } else if (formatted_value_second >= 80 && formatted_value_second <= 82) {
            formatted_value_second_output = '2.5';
          } else if (formatted_value_second >= 77 && formatted_value_second <= 79) {
            formatted_value_second_output = '2.75';
          } else if (formatted_value_second >= 75 && formatted_value_second <= 76) {
            formatted_value_second_output = '3.0';
          } else if (formatted_value_second < 75 && formatted_value_second >= 1) {
            formatted_value_second_output = '5';
          } else if (formatted_value_second === '' || formatted_value_second == 0.00 || formatted_value_second == null) {
            formatted_value_second_output = formatted_value_second;
          }
          if (formatted_value_first >= 98 && formatted_value_first <= 100) {
            formatted_value_first_output = '1.0';
          } else if (formatted_value_first >= 95 && formatted_value_first <= 97) {
            formatted_value_first_output = '1.25';
          } else if (formatted_value_first >= 92 && formatted_value_first <= 94) {
            formatted_value_first_output = '1.5';
          } else if (formatted_value_first >= 89 && formatted_value_first <= 91) {
            formatted_value_first_output = '1.75';
          } else if (formatted_value_first >= 86 && formatted_value_first <= 88) {
            formatted_value_first_output = '2.0';
          } else if (formatted_value_first >= 83 && formatted_value_first <= 85) {
            formatted_value_first_output = '2.25';
          } else if (formatted_value_first >= 80 && formatted_value_first <= 82) {
            formatted_value_first_output = '2.5';
          } else if (formatted_value_first >= 77 && formatted_value_first <= 79) {
            formatted_value_first_output = '2.75';
          } else if (formatted_value_first >= 75 && formatted_value_first <= 76) {
            formatted_value_first_output = '3.0';
          } else if (formatted_value_first < 75 && formatted_value_first >= 1) {
            formatted_value_first_output = '5';
          } else if (formatted_value_first === '' || formatted_value_first == 0.00 || formatted_value_first == null) {
            formatted_value_first_output = formatted_value_first;
          }




        // Output the general averages based on selectedSem value
        if (selectedSem == "all") {
          // Output both first and second semester general averages
          html += '<tr class="spaceUnder"><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: hidden;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: hidden;"><strong><u>GENERAL AVERAGE </u></strong></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: hidden;"></td><td style="border-top: 1px solid black;border-left: hidden;border-right: hidden;">' + formatted_value_all_output +'</td><td style="border-top: 1px solid black;border-left:hidden;border-right: 1px solid black;"></td></tr>';
          //html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: hidden;border-top: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: hidden;border-top: 1px solid black;"><strong><u>GENERAL AVERAGE (Second Sem)</u></strong></td><td style="border-left: 1px solid black;border-right: hidden;border-top: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: hidden;border-right: hidden;">' + secondSemesterAverage + '</td><td style="border-top: 1px solid black;border-left:hidden;border-right: 1px solid black;"></td></tr>';
        } else if (selectedSem == "1") {
          // Output first semester general average
          html += '<tr class="spaceUnder"><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: hidden;"></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: hidden;"><strong><u>GENERAL AVERAGE </u></strong></td><td style="border-top: 1px solid black;border-left: 1px solid black;border-right: hidden;"></td><td style="border-top: 1px solid black;border-left: hidden;border-right: hidden;">' + formatted_value_first_output + '</td><td style="border-top: 1px solid black;border-left:hidden;border-right: 1px solid black;"></td></tr>';
        } else if (selectedSem == "2") {
          // Output second semester general average
          html += '<tr class="spaceUnder"><td style="border-left: 1px solid black;border-right: hidden;border-top: 1px solid black;"></td><td style="border-left: 1px solid black;border-right: hidden;border-top: 1px solid black;"><strong><u>GENERAL AVERAGE </u></strong></td><td style="border-left: 1px solid black;border-right: hidden;border-top: 1px solid black;"></td><td style="border-top: 1px solid black;border-left: hidden;border-right: hidden;">' + formatted_value_second_output + '</td><td style="border-top: 1px solid black;border-left:hidden;border-right: 1px solid black;"></td></tr>';
        }
      }
      $('tbody').html(html);
    }
  });
}


  load_data();

 

  $(document).on('blur', '.table_data', function(){
    var id = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>Grades/update",
      method:"POST",
      data:{id:id, table_column:table_column, value:value},
      success:function(data)
      {
        var stat = 'Updated';
        success(stat);
        load_data(true);
      }
    })
  });

  
});

</script>