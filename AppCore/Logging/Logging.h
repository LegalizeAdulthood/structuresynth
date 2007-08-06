#pragma once

#include <QString>
#include <QVector>

namespace AppCore {
	namespace Logging {	
		/// Predefined logging levels
		enum LogLevel { NoneLevel, DebugLevel, TimingLevel, InfoLevel, WarningLevel, CriticalLevel, AllLevel };

		/// Abstract base class for all loggers
		class Logger {
		public:
			/// The destructors and constructors automatically add to the list of installed loggers.
			Logger() { 
				loggers.append(this); 
			}

			virtual ~Logger() { 
				// Remove from list of available loggers.
				for (int i = loggers.size()-1; i >= 0; i--) {
					if (loggers[i] == this) loggers.remove(i);
				}
			}

			/// This method all loggers must implement
			virtual void log(QString message, int priority) = 0;

			/// Log messages are sent to this list of loggers.
			static QVector<Logger*> loggers;
		};


		void LOG(QString message, int priority);

		/// Useful aliases
		void Debug(QString text);
		void INFO(QString text);
		void WARNING(QString text);
		void CRITICAL(QString text);
		
	}
}