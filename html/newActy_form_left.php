<table class="table borderless is-fullwidth">
<thead>
  <tr>
    <td>
    </td>
  </tr>
</thead>

<tbody>
  <!--/ TITLE /-->
  <tr>
    <td colspan="3">
      <div class="field">
        <input class="input" name="title" placeholder="What Activity? Be Specific." type="text">
      </div>
    </td>
  </tr>

  <!--/ TEXTAREA /-->
  <tr>
    <td colspan="3">
      <div style="padding:4px;border-radius:5px;background: #f4f4f4">
        <textarea id="textarea" name="textarea"></textarea>
      </div>
    </td>
  </tr>

  <!--/ TAG BUTTONS /-->
  <tr>
    <td colspan="2">
      <div class="field is-fullwidth">
        <!--  -->
        <input class="input is-fullwidth" id="demo3" type="text">
      </div>
    </td>
    <td width="10">
      <div class="field buttons has-addons">
        <p class="control">
          <a class="button is-danger is-outlined is-small" id="remove_all_tags"><i aria-hidden="true" class="fa fa-eraser"></i></a>
        </p>

        <p class="control">
          <a class="button is-success is-outlined is-small" onclick="$('#demo3').tagEditor('addTag', 'Innovation');"><i aria-hidden="true" class="fa fa-users"></i></a>
        </p>
      </div>
    </td>
  </tr>

  <!--/ SUBMIT BUTTONS /-->
  <tr>
    <td>
    </td>
    <td width="10">
      <a class="button is-danger is-outlined" id="reset">Clear</a>
    </td>
    <td width="10">
      <a class="button is-info is-outlined" id="submit" name="submit" type="submit">Submit</a>
    </td>
  </tr>
</tbody>
</table>