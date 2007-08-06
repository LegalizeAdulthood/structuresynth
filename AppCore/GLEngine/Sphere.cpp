#include "Sphere.h"

namespace AppCore {
	namespace GLEngine {


		//GLUquadric* Sphere::myQuad = 0;    

		Sphere::Sphere(AppCore::Math::Vector3f center, float radius) : center(center), radius(radius) {
			if (true) {
				myQuad = gluNewQuadric();    
				gluQuadricDrawStyle(myQuad, GLU_FILL);
			}
		};

		Sphere::~Sphere() {
			gluDeleteQuadric(myQuad);
		};
 
		void Sphere::draw() {
			glPushMatrix();
			glTranslatef( center.x(), center.y(), center.z() );
			gluSphere(myQuad, radius, 12, 12);	
			glPopMatrix();			
		};

	}
}