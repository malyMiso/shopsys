<?php

namespace Shopsys\FrameworkBundle\Component\Router\FriendlyUrl;

class FriendlyUrlDataFactory implements FriendlyUrlDataFactoryInterface
{
    /**
     * @param array $data
     * @return \Shopsys\FrameworkBundle\Component\Router\FriendlyUrl\FriendlyUrlData
     */
    public function createFromData($data)
    {
        $friendlyUrlData = new FriendlyUrlData();
        $friendlyUrlData->id = $data['id'];
        $friendlyUrlData->name = $data['name'];

        return $friendlyUrlData;
    }

    /**
     * @return \Shopsys\FrameworkBundle\Component\Router\FriendlyUrl\FriendlyUrlData
     */
    public function create(): FriendlyUrlData
    {
        return new FriendlyUrlData();
    }
}
