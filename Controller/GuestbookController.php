<?php

namespace MwopGuestbook\Controller;

use MwopGuestbook\Form\Guestbook as GuestbookForm,
    MwopGuestbook\Model\Guestbook,
    MwopGuestbook\Model\GuestbookMapper,
    Zend\Mvc\Controller\ActionController;

class GuestbookController extends ActionController
{
    public $mapper;

    public function indexAction()
    {
        return array('entries' => $this->mapper->fetchAll());
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new GuestbookForm();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->post()->toArray())) {
                $comment = new Guestbook($form->getValues());
                $this->mapper->save($comment);
                return $this->redirect()->toRoute('mwopguestbook');
            }
        }

        return array('form' => $form);
    }

    public function setMapper(GuestbookMapper $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
}
