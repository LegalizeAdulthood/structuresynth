#pragma once

#include "SyntopiaCore/Math/Vector3.h"
#include "../Object3D.h"
#include "AtomicCounter.h"
#include "VoxelStepper.h"
#include "Sampler.h"
#include "SyntopiaCore/Math/Random.h"

namespace SyntopiaCore {
	namespace GLEngine {	

		using namespace SyntopiaCore::Math;

		class RenderThread : public QThread {
		public:
			enum Task { Raytrace } ;
			RenderThread();
			~RenderThread();
			void setTask(Task task) { this->task = task; };
			RenderThread(const RenderThread& other);
			void raytrace(int newUnit);
			void setCounters(AtomicCounter* nextUnit, AtomicCounter* completedUnits, int maxUnits);
			void alloc(int w, int h);
			void setObjects(int count);
			static void msleep(int i) { QThread::msleep(i); }
			void run();
			Vector3f rayCastPixel(float x, float y);
			void seed(int value) { rg.setSeed(value); };
			double getAOStrength(Object3D* object, Vector3f objectNormal, Vector3f objectIntersection);
			Vector3f rayCast(Vector3f startPoint, Vector3f direction, Object3D* excludeThis, int level = 0);

		private:
			Task task;
			AtomicCounter* nextUnit;
			AtomicCounter* completedUnits;
			int maxUnits;
			int w;
			int h;

			// Shared between instances...
			double* depths;
			Vector3f* normals;
			Vector3f* colors;
			Vector3f* intersections;
			double* aoMap;
			Object3D** objs;

			Vector3f frontStart;
			Vector3f frontX;
			Vector3f frontY;
			Vector3f backStart;
			Vector3f backX;
			Vector3f backY;

			Vector3f lightPos;
			Vector3f backgroundColor;
			int rayID;
			QVector<int> rayIDs;
			int pixels;
			int checks;
			VoxelStepper* accelerator;

			int aoSamples;
			int totalAOCasts;
			int aaSamples;
			int width;
			int height;
			bool useShadows;
			double dofCenter;
			double dofFalloff;

			Math::RandomNumberGenerator rg;

			Vector3f normal;
			double depth;
			Vector3f color;
			Vector3f intersection;
			Object3D* hitObject;
			bool copy;

			Sampler* sampler;
			friend class RayTracer;
		};



	}
}

