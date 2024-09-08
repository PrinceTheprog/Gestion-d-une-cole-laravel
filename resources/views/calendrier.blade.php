<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" class="form-control">
             
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
            <option value="Late">Late</option>
        </select>
    </div>
    <div class="form-group">
        <label for="reason">Reason (optional)</label>
        <textarea name="reason" id="reason" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Mark Attendance</button>
</form>
