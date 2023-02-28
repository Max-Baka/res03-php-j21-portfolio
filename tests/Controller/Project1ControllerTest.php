<?php

namespace App\Test\Controller;

use App\Entity\Project1;
use App\Repository\Project1Repository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Project1ControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private Project1Repository $repository;
    private string $path = '/project1/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Project1::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Project1 index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'project1[Name]' => 'Testing',
            'project1[Firsttechno]' => 'Testing',
            'project1[Secondtechno]' => 'Testing',
            'project1[Description]' => 'Testing',
        ]);

        self::assertResponseRedirects('/project1/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Project1();
        $fixture->setName('My Title');
        $fixture->setFirsttechno('My Title');
        $fixture->setSecondtechno('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Project1');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Project1();
        $fixture->setName('My Title');
        $fixture->setFirsttechno('My Title');
        $fixture->setSecondtechno('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'project1[Name]' => 'Something New',
            'project1[Firsttechno]' => 'Something New',
            'project1[Secondtechno]' => 'Something New',
            'project1[Description]' => 'Something New',
        ]);

        self::assertResponseRedirects('/project1/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getFirsttechno());
        self::assertSame('Something New', $fixture[0]->getSecondtechno());
        self::assertSame('Something New', $fixture[0]->getDescription());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Project1();
        $fixture->setName('My Title');
        $fixture->setFirsttechno('My Title');
        $fixture->setSecondtechno('My Title');
        $fixture->setDescription('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/project1/');
    }
}
