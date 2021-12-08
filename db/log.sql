CREATE TABLE `s_logs` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id',
    `ip` varchar(50) NOT NULL DEFAULT '' COMMENT 'ip地址',
    `operate` varchar(255) NOT NULL DEFAULT '' COMMENT '操作说明',
    `desc` text NOT NULL COMMENT '操作内容',
    `operator` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '操作者',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `idx_ip` (`ip`),
    KEY `idx_operate` (`operate`),
    KEY `idx_operator` (`operator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='操作日志表';
