<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Member;

class MemberController extends Controller
{
  public function index() {
    $members = Member::all();
    $this->view('member/index', ['members' => $members]);
  }

  public function show($id) {
    $member = Member::find($id, 'array');
    $this->view('member/show', ['member' => $member]);
  }

  public function new() {
    $this->view('member/new');
  }

  public function create() {
    $member = new Member($_POST);
    $success = $member->create($member->attributes());
    if ($success) {
      $this->redirect('/member/index');
    } else {
      $this->view('member/new', ['member' => $_POST]);
    }
  }

  public function edit($id) {
    $member = Member::find($id, 'array');
    $this->view('member/edit', ['member' => $member]);
  }

  public function update($id) {
    $member = Member::find($id);
    $sanitized_params = $this->permit_params($_POST, ['name','email','filiation_date']);
    $success = $member->update($sanitized_params);
    if ($success) {
      $this->redirect('/member/index');
    } else {
      $this->view('member/edit', ['member' => $member->attributes()]);
    }
  }

  public function destroy($id) {
    $success = Member::destroy($id);
    $this->redirect('/member/index');
  }
}
