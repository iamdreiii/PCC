<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$.ajax({
    url: '<?php echo base_url("Student/get_year_level"); ?>',
    dataType: 'json',
    success: function(year_level) {
        var options = '';
        options += '<option value="All">Select Year Level</option>';
        $.each(year_level, function(index, year_level) {
            options += '<option value="' + year_level.id + '">' + year_level.year + '</option>';
        });
        $('#filter_year_level').html(options);
    }
});

// Function to load subjects based on selected year level
// JavaScript - loadSubjectsByYearLevel function
var year = <?=$year?>;
loadSubjectsByYearLevel(year);
function loadSubjectsByYearLevel(yearLevel) {
    var id = <?=$id?>;
  $.ajax({
    url: '<?php echo base_url(); ?>Student_subjects/getSubjectsData',
    type: 'GET',
    data: { id: id, yearLevel: yearLevel },
    dataType: 'json',
    success: function(response) {
      var subjectsData = response.subjectsData;
      var totalUnits = response.totalUnits;

      var tableContainer = $("#myTable");

      // Clear the existing table
      tableContainer.empty();

      if (subjectsData.length == 0) {
        tableContainer.html('<tr><td colspan="5" style="text-align: center;">No Matching Records</td></tr>');
      } else {
        var tableHTML = '<thead><tr><th><input id="checkAll" type="checkbox"></th><th>COURSE CODE</th><th>COURSE DESCRIPTION</th><th>UNITS</th><th>PRE-REQ</th></tr></thead><tbody>';

        var firstSemesterData = subjectsData.filter(function(row) {
          return row.semester == 1;
        });

        var secondSemesterData = subjectsData.filter(function(row) {
          return row.semester == 2;
        });

        if (firstSemesterData.length > 0) {
          tableHTML += '<tr><td colspan="5" style="text-align: center;"><strong><u>First Semester</u></strong></td></tr>';

          firstSemesterData.forEach(function(row) {
            tableHTML += '<tr><td><input type="checkbox" name="selected[]" class="selected" value="' + row.id + '"></td><td>' + row.subcode + '</td><td>' + row.description + '</td><td>' + row.units + '</td><td>' + row.prereq + '</td></tr>';
          });
        }

        if (secondSemesterData.length > 0) {
          tableHTML += '<tr><td colspan="5" style="text-align: center;"><strong><u>Second Semester</u></strong></td></tr>';

          secondSemesterData.forEach(function(row) {
            tableHTML += '<tr><td><input type="checkbox" name="selected[]" class="selected" value="' + row.id + '"></td><td>' + row.subcode + '</td><td>' + row.description + '</td><td>' + row.units + '</td><td>' + row.prereq + '</td></tr>';
          });
        }

        tableHTML += '<tr><td></td><td></td><td style="text-align: center;">TOTAL UNITS</td><td>' + totalUnits + '</td><td></td></tr>';
        tableHTML += '</tbody>';

        tableContainer.html(tableHTML);
        var checkAllCheckbox = $("#checkAll");
        var selectedCheckboxes = $(".selected");

        checkAllCheckbox.on('click', function() {
          
          selectedCheckboxes.prop('checked', checkAllCheckbox.prop('checked'));
        }); 

        $('#addLoads').on('click', function() {
          var selectedSubjects = $('input.selected:checked'); 

          if (selectedSubjects.length === 0) {
            alert('No subjects selected.'); 
            return;
          }



          var subjectData = []; 
          selectedSubjects.each(function() {
            var subjectId = $(this).val();
            var subjectCode = $(this).closest('tr').find('td:nth-child(2)').text();
            var subject = {
              id: subjectId,
              code: subjectCode
            };
            subjectData.push(subject);
          });
          // Send the selected subject IDs to the server to add to the student_subject_loads table
          var id = <?=$id?>;
          $.ajax({
           
            url: '<?php echo base_url(); ?>Student_subjects/addLoads',
            type: 'POST',
            data: { id:id, subjectData: subjectData },
            dataType: 'json',
            success: function(response) {
              if (response.success) {
                // Success message
                alert('Subjects added to the student_subject_loads table successfully!');
                // Refresh the page or perform any other action as needed
              } else {
                // Error message
                if (response.existingSubjects && response.existingSubjects.length > 0) {
                  var scriptElement = document.createElement('div');
                  scriptElement.innerHTML = response.existingSubjects;
                  var errorMessage = scriptElement.textContent || scriptElement.innerText || '';
                  alert('The following subjects already exist in the student subjects: ' + errorMessage.trim());
                } else {
                  alert('Error occurred while adding loads.');
                }
              }
            },
            error: function(xhr, status, error) {
              var existingSubjects = xhr.responseJSON && xhr.responseJSON.existingSubjects;
              if (existingSubjects && existingSubjects.length > 0) {
                var scriptElement = document.createElement('div');
                scriptElement.innerHTML = existingSubjects;
                var errorMessage = scriptElement.textContent || scriptElement.innerText || '';
                alert('The following subjects already exist in the student subjects: ' + errorMessage.trim());
              } else {
                alert('Error occurred while adding loads.');
              }
            }

          });
        });


      }
    },
    error: function() {
      console.log('Error occurred while fetching data.');
    }
  });
}

// Event listener for year level selection change
$(document).on("change", "#filter_year_level", function() {
  var selectedYearLevel = $(this).val();
  console.log(selectedYearLevel);
  loadSubjectsByYearLevel(selectedYearLevel);
});


</script>