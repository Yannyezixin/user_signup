<?php
/**
 * 帐号激活码
 */
class Activation extends BaseModel
{
    /**
     * 数据库表名称(不包含前缀)
     *
     * @var string
     */
    protected $table = 'activations';

    /**
     * 禁止维护timestamp
     * @var boolean
     */
    public $timestamps = false;
}
