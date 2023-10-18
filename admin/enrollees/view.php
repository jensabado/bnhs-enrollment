<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bnhs-enrollment/database/connection.php');
if(isset($_GET['id'])) {
  $stmt = $conn->prepare("SELECT tbl_student.*, tbl_grade_level.grade FROM tbl_student LEFT JOIN tbl_grade_level ON tbl_student.grade_level_id = tbl_grade_level.id WHERE tbl_student.id = ? AND tbl_student.is_deleted = 'no';");
  $stmt->bind_param("i", $_GET['id']);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0) {
    $student = $result->fetch_assoc();
    $stmt->close();
    $stmt = $conn->prepare('SELECT * FROM tbl_requirements WHERE student_id = ?');
    $stmt->bind_param("i", $student['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
      $req = $result->fetch_assoc();
      $stmt->close();
    }
  } else {
    echo '<script>window.history.back();</script>';
  }
} else {
  echo '<script>window.history.back();</script>';
}
$page_title = 'View Enrollee';
ob_start();

?>
<style>
.no-search .select2-search {
  display: none;
}
</style>

<section class="section">
  <div class="section-header">
    <h1><?= $student['lastname'] . ', ' . $student['firstname']  ?>
      <?= !empty($student['middle_initial']) ? ' ' . $student['middle_initial'] . '.' : '' ?></h1>
  </div>

  <div class="section-body">
    <form action="" id="information_form">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h6>Personal Information</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">LRN</label>
                <input type="text" name="lrn" id="lrn" class="form-control" value="<?= $student['lrn'] ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Grade Level</label>
                <input type="text" name="grade_level_id" id="grade_level_id" class="form-control"
                  value="<?= $student['grade'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control"
                  value="<?= $student['lastname'] ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control"
                  value="<?= $student['firstname'] ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Middle Initial</label>
                <input type="text" name="middle_initial" id="middle_initial" class="form-control"
                  value="<?= $student['middle_initial'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Gender</label>
                <select name="gender" id="gender" class="form-select form-control">
                  <option value="Male" <?= $student['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                  <option value="Female" <?= $student['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                  value="<?= $student['date_of_birth'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="address" rows="10" class="form-control"
                  style="resize: none;"><?=  $student['address'] ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Place of Birth</label>
                <textarea name="place_of_birth" id="place_of_birth" rows="10" class="form-control"
                  style="resize: none;"><?= $student['place_of_birth'] ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Nationality</label>
                <input type="text" name="nationality" id="nationality" class="form-control"
                  value="<?= $student['nationality'] ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Religion</label>
                <input type="text" name="religion" id="religion" class="form-control"
                  value="<?= $student['religion'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h6>Contact Information</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Student Contact</label>
                <input type="text" name="contact" id="contact" class="form-control"
                  value="<?= $student['contact_no'] ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Student Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $student['email'] ?>">
              </div>
            </div>
            <?php if($student['status'] != 0) { ?>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Student Password</label>
                <input type="password" name="password" id="password" class="form-control"
                  value="<?= $student['password'] ?>">
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Guardian's Name</label>
                <input type="text" name="guardian_name" id="guardian_name" class="form-control"
                  value="<?= $student['guardian'] ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Guardian's Contact</label>
                <input type="text" name="guardian_contact" id="guardian_contact" class="form-control"
                  value="<?= $student['parent_contact_no'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h6>Requirements</h6>
            </div>
          </div>
          <?php if($student['grade_level_id'] === 1 && isset($req)) { ?>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group d-flex flex-column">
                <label for="">Video Record</label>
                <a href="<?= $rootSiteURLAdmin .'assets/requirements/video-record/' . $req['video_record'] ?>"
                  target="_blank" style="text-decoration: underline; color: #0000EE;"><?= $req['video_record'] ?></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group d-flex flex-column">
                <label for="">PDF File</label>
                <a href="<?= $rootSiteURLAdmin .'assets/requirements/pdf-file/' . $req['pdf_file'] ?>" target="_blank"
                  style="text-decoration: underline; color: #0000EE;"><?= $req['pdf_file'] ?></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group d-flex flex-column">
                <label for="">Form 138</label>
                <a href="<?= $rootSiteURLAdmin .'assets/requirements/form-138/' . $req['form_138'] ?>" target="_blank"
                  style="text-decoration: underline; color: #0000EE;"><?= $req['form_138'] ?></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group d-flex flex-column">
                <label for="">PSA Birth Cert</label>
                <a href="<?= $rootSiteURLAdmin .'assets/requirements/psa-birth-cert/' . $req['psa_birth_cert'] ?>"
                  target="_blank" style="text-decoration: underline; color: #0000EE;"><?= $req['psa_birth_cert'] ?></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group d-flex flex-column">
                <label for="">Barangay Clearance</label>
                <a href="<?= $rootSiteURLAdmin .'assets/requirements/brgy-clearance/' . $req['brgy_clearance'] ?>"
                  target="_blank" style="text-decoration: underline; color: #0000EE;"><?= $req['brgy_clearance'] ?></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group d-flex flex-column">
                <label for="">Good Moral</label>
                <a href="<?= $rootSiteURLAdmin .'assets/requirements/good-moral/' . $req['good_moral'] ?>"
                  target="_blank" style="text-decoration: underline; color: #0000EE;"><?= $req['good_moral'] ?></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group d-flex flex-column">
                <label for="">ID of Guardian</label>
                <a href="<?= $rootSiteURLAdmin .'assets/requirements/guardian-id/' . $req['guardian_id'] ?>"
                  target="_blank" style="text-decoration: underline; color: #0000EE;"><?= $req['guardian_id'] ?></a>
              </div>
            </div>
          </div>
          <?php } else { ?>
          <p>No requirements found.</p>
          <?php } ?>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary" id="submit_btn">Update Information</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="section-body mt-3">
    <form action="" id="status_form">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h6>Status</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="" selected disabled>SELECT STATUS</option>
                  <?php if($student['status'] === 0) { ?>
                  <option value="1">Enroll to Grade 7</option>
                  <option value="8">Decline</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4 d-none" id="section_cont">
              <div class="form-group">
                <label for="">Section</label>
                <select name="section" id="section" class="form-control" style="width: 100% !important;" disabled>
                  <option value="" selected disabled>SELECT SECTION</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 d-none" id="password_cont">
              <div class="form-group">
                <label for="">Student Password</label>
                <input type="password" name="status_password" id="status_password" class="form-control"
                  value="<?= $student['password'] ?>">
              </div>
            </div>
          </div>
          <div class="row d-none" id="reason_cont">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Reason</label>
                <textarea name="reason" id="reason" rows="10" style="resize: none;" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary" id="status_submit_btn">Update Status</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<?php

$content = ob_get_clean();
ob_start();
?>
<script>
$(document).ready(function() {
  // SELECT2 INITIALIZATION
  $('#section').select2();
  $('#status').select2({
    dropdownCssClass: "no-search"
  });

  // STATUS ON CHANGE
  $('#status').on('change', function(e) {
    e.preventDefault();

    let id = $(this).val();

    if (id == 1) {
      $('#reason_cont').addClass('d-none');
      $('#section_cont').removeClass('d-none');
      $('#password_cont').removeClass('d-none');
      $('#section').attr('disabled', false);
      let form = new FormData();
      form.append('get_section', true);
      form.append('grade_level', id);

      $.ajax({
        type: "POST",
        url: "<?= $rootSiteURLAdmin ?>controller/function_class",
        data: form,
        contentType: false,
        processData: false,
        cache: false,
        success: function(response) {
          console.log(response);
          $('#section').append(response);
        }
      })
    } else if (id == 8) {
      $('#section_cont').addClass('d-none')
      $('#section').attr('disabled', true);
      $('#reason_cont').removeClass('d-none');
    }
  })

  // submit form
  $('#status_form').on('submit', function(e) {
    e.preventDefault();

    let form = new FormData(this);
    form.append('status_update', true);
    form.append('student_id', '<?= $student['id'] ?>');

    $.ajax({
      type: "POST",
      url: "<?= $rootSiteURLAdmin ?>controller/function_class",
      data: form,
      contentType: false,
      processData: false,
      cache: false,
      beforeSend: function() {
        $('#status_submit_btn').attr('disabled', true);
      },
      complete: function() {
        $('#status_submit_btn').attr('disabled', false);
      },
      success: function(response) {
        console.log(response);
      }
    })
  })
})
</script>
<?php
$script = ob_get_clean();
include('../layout/master.php');
?>