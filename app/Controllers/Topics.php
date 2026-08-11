<?php
namespace App\Controllers;

use App\Models\TopicModel;

class Topics extends BaseController
{
    protected $topicModel;

    public function __construct()
    {
        $this->topicModel = new TopicModel();
    }

    public function index()
    {
        $data['topics'] = $this->topicModel->orderBy('category', 'ASC')->findAll();
        return view('topics/index', $data);
    }

    public function add()
    {
        $this->topicModel->insert([
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'is_done' => 0,
        ]);
        return redirect()->to('/topics');
    }

    public function toggle($id)
    {
        $topic = $this->topicModel->find($id);
        $this->topicModel->update($id, ['is_done' => $topic['is_done'] ? 0 : 1]);
        return redirect()->to('/topics');
    }

    public function delete($id)
    {
        $this->topicModel->delete($id);
        return redirect()->to('/topics');
    }
}