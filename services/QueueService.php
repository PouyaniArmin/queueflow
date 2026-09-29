<?php

namespace Services;

use Config\Env;
use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class QueueService
{
    private ?AMQPStreamConnection $connection = null;
    private ?AMQPChannel $channel = null;
    private string $defaultQueue;

    public function __construct()
    {
        Env::getInstance();
        $this->defaultQueue = Env::getEnv('RABBITMQ_QUEUE') ?: 'emails';
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $this->connection = new AMQPStreamConnection(
                Env::getEnv('RABBITMQ_HOST'),
                (int) Env::getEnv('RABBITMQ_PORT'),
                Env::getEnv('RABBITMQ_USER'),
                Env::getEnv('RABBITMQ_PASSWORD')
            );
            $this->channel = $this->connection->channel();
        } catch (Exception $e) {
            throw new Exception('RabbitMQ connection failed: ' . $e->getMessage());
        }
    }

    public function publish(array $payload, ?string $queue = null): void
    {
        $queue = $queue ?: $this->defaultQueue;

        $this->channel->queue_declare($queue, false, true, false, false);

        $message = new AMQPMessage(json_encode($payload, JSON_UNESCAPED_UNICODE), [
            'content_type'  => 'application/json',
            'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
        ]);

        $this->channel->basic_publish($message, '', $queue);
    }

    public function consume(callable $callback, ?string $queue = null): void
    {
        $queue = $queue ?: $this->defaultQueue;

        $this->channel->queue_declare($queue, false, true, false, false);
        $this->channel->basic_qos(null, 1, null);

        $this->channel->basic_consume(
            $queue,
            '',
            false,
            false,
            false,
            false,
            $callback
        );

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }
    }

    public function __destruct()
    {
        try {
            $this->channel?->close();
            $this->connection?->close();
        } catch (Exception $e) {
            // ignore close errors
        }
    }
}