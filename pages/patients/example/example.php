<form class="form-horizontal">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">ชื่อ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $row->firstname; ?>" disabled="true">
      </div>
    </div>
    <div class="form-group row">
      <label for="lastname" class="col-sm-2 col-form-label">นามสกุล</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $row->lastname; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputName2" class="col-sm-2 col-form-label">test</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName2" placeholder="Name" value="<?php echo '$test_id'; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputExperience" placeholder="Experience" value="5555"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
          </label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </form>